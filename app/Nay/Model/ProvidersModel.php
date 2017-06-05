<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class ProductsModel extends BaseModel
{

	use SoftDeletes;

	protected $table = 'providers';


	protected $fillable = [
							'id', 
							'slug', 
							'name',
							'description', 
							'personal_contact',
							'postal_code',
							'address',
							'address_number',
							'address_complement',
							'phone',
							'cellphone',
							'email',
							'site'
							'deleted_by',
							'deleted_at'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;


}