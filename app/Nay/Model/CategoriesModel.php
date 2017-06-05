<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class CategoriesModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'categories';


	protected $fillable = [
							'id', 
							'name', 
							'description', 
							'level', 
							'created_by', 
							'updated_by',
							'deleted_by',
							'tags'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;

	protected $casts = ['tags' => 'array'];

}