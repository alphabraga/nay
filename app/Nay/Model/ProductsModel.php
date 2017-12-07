<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class ProductsModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'products';

	protected $imagePath = 'public/images/products/';


	protected $fillable = [
							'id', 
							'slug', 
							'name',
							'description', 
							'tags',
							'quantity_limit',
							'quantity',
							'sale_price',
							'purchase_price',
							'created_by',
							'updated_by',
							'deleted_by',
							'created_at',
							'updated_at',
							'deleted_at'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;

	protected $casts = ['tags' => 'array'];

	

}