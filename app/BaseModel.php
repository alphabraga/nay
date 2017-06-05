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
}