<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;
use App\Nay\Model\PaymentMethod;
use App\Nay\Model\SaleCategory;

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
							'payment_method',
							'transaction_method',
							'status',
							'category',
							'created_by',  
							'updated_by',  
							'deleted_by',  
							'created_at',  
							'updated_at',  
							'deleted_at'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;

	public function setPaymentMethod(PaymentMethod $paymentMethod)
	{
		$this->payment_method = $paymentMethod;
	}

	public function getPaymentMethod()
	{
		return new PaymentMethod($this->payment_method);
	}

	public function setSaleCategory(SaleCategory $saleCategory)
	{
		$this->sale_category = $saleCategory;
	}

	public function getSaleCategory()
	{
		return new SaleCategory($this->sale_category);
	}

}