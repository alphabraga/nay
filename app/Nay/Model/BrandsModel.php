<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;

use \Illuminate\Database\Eloquent\SoftDeletes;


class BrandsModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'brands';

	protected $imagePath = 'public/images/brands/';


	protected $fillable = [
							'id', 
							'name',
							'slug', 
							'description', 
							'tags',
							'provider_id', 
							'created_by', 
							'updated_by',
							'deleted_by'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;


	protected $casts = ['tags' => 'array'];


	public function provider()
    {
		return $this->belongsTo('App\Nay\Model\ProvidersModel', 'provider_id');
    }


}