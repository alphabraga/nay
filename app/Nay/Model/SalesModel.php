<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class SalesModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'sales';

	protected $fillable = [
							'id',          
							'name',        
							'phone',       
							'cellphone',   
							'address',     
							'postalcode',  
							'adressnumber',
							'created_by',  
							'updated_by',  
							'deleted_by',  
							'created_at',  
							'updated_at',  
							'deleted_at'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;

}