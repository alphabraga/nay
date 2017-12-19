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
							'external_code', 
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
							'deleted_at',
							'custom_field1',
							'custom_field2',
							'custom_field3',
							'custom_field4',
							'custom_field5',
							'custom_field6'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;

	protected $casts = ['tags' => 'array'];

	

}