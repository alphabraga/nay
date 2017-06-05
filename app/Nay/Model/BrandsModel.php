<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;

use \Illuminate\Database\Eloquent\SoftDeletes;


class BrandsModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'brands';


	protected $fillable = [
							'id', 
							'name', 
							'description', 
							'tags', 
							'created_by', 
							'updated_by',
							'deleted_by'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;


	protected $casts = ['tags' => 'array'];


}