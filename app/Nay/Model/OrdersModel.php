<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class OrdersModel extends BaseModel
{

	use SoftDeletes;

	protected $table = 'orders';


	protected $fillable = [
							'id', 
							'created_by', 
							'updated_by',
							'deleted_by'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;


}