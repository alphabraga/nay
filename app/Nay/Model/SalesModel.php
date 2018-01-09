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
							'client_id',
							'salesman_id',
							'status',          
							'payment_method',
							'transaction_method',
							'transction_method',
							'shipping_company_id',
							'discount',
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

	public function client()
    {
		return $this->belongsTo('App\Nay\Model\ClientsModel', 'client_id');
    }

	public function salesman()
    {
		return $this->belongsTo('App\User', 'salesman_id');
    }

	public function user()
    {
		return $this->belongsTo('App\User', 'created_by');
    }

	public function itens()
    {
		return $this->hasMany('App\Nay\Model\SalesItensModel', 'sale_id');
    }


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


	public function getTotalAttribute()
	{
		$total = 0;

		foreach ($this->itens as $item)
		{
			$total += $item->price;
		}

		return $total;
	}

	public function getTotalQuantityAttribute()
	{
		return $this->itens->count();
	}

	public function getLiquidAttribute()
	{
		$liquid = 0;

		foreach ($this->itens as $item)
		{
			$liquid += $item->price;
		}

		return $liquid - $this->discount;
	}

	public function getPaymentMethodNameAttribute()
	{
		return \App\Nay\Model\PaymentMethod::name($this->payment_method);
	}

	public function getSaleCategoryNameAttribute()
	{
		return \App\Nay\Model\SaleCategory::name($this->sale_category);
	}

}