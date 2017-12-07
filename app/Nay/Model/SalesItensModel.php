<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class SalesItensModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'salesitens';

	protected $fillable = [
							'id',          
							'state',        
							'quantity',       
							'product_id',   
							'price',     
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