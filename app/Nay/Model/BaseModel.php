<?php

namespace App\Nay\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

 	public static function boot()
 	{
        parent::boot();

        static::creating(function($model)
        {
            if(\Auth::check())
            {

                $model->created_by = \Auth::user()->id;
                $model->updated_by = \Auth::user()->id;
            }

        });

        static::updating(function($model)
        {
            if(\Auth::check())
            {
                $model->updated_by = \Auth::user()->id;
            }

        });        
    }

    public function remove()
    {
        try
        {
            $afectedRows = $this->delete();
     
            return ['afectedRows' => $afectedRows, 'error' => null];
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            return ['afectedRows' => null, 'error' => $e->getCode(), 'exception' => $e];
        }
    }


    public function getImageFileName($withPath = true, $withNumber = true, $withExtension = true)
    {
        if($withNumber)
        {
            $savedImages = $this->getImages();

            $numberOfSavedImages = count($savedImages);

            $nextNumberOfImage = $numberOfSavedImages++;
        }

        return (($withPath)? $this->imagePath : '') . $this->id . '-' . $this->slug . '-' . (($withNumber)? $nextNumberOfImage: '') . (($withExtension)? '.jpg': '');
    }

    public function saveFakeImage(\Faker\Generator $faker)
    {
        $imageFileName = $this->getIMageFileName(true, true, true);

        file_put_contents($imageFileName, file_get_contents($faker->imageUrl(255, 255)));
    }

    public function getImages()
    {
        //get images witout number and without extension
        $images = glob($this->getImageFileName(true, false, false) . '*');

        return $images;
    }

}