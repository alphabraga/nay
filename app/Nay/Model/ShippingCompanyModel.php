<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class ShippingCompanyModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'shipping_company';

	protected $imagePath = 'images/shipping_company/';

	protected $fillable = [
							'id', 
							'name',
							'color',
							'slug', 
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