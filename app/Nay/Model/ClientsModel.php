<?php
/*

namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class ClientsModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'clients';

	protected $imagePath = 'images/clients/';

	protected $fillable = [
							'id',          
							'name',
							'nickname',
							'observation',        
							'phone',       
							'cellphone',   
							'cpf',
							'shipping_address',
							'shipping_number',
							'shipping_neighborhood',
							'shipping_postalcode',
							'shipping_city',
							'shipping_state',
							'shipping_country',
							'shipping_complement',
							'billing_address',
							'billing_number',
							'billing_neighborhood',
							'billing_postalcode',
							'billing_city',
							'billing_state',
							'billing_country',
							'billing_complement',
							'created_by',  
							'updated_by',  
							'deleted_by',  
							'created_at',  
							'updated_at',  
							'deleted_at'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;

    public function sales()
    {
        return $this->hasMany('App\Nay\Model\SalesModel', 'client_id', 'id');
    }


    public function isValidForOnlineShopping()
    {

    	return false;
    }

    public function isValidForCreditCardShopping()
    {

    	return false;
    }

	public function getTotalLiquidAttribute()
	{
		$total = 0;

		foreach ($this->sales as $sale)
		{
			$total += $sale->liquid;
		}

		return $total;
	}


	public function getTotalDebitAttribute()
	{
		$totalDebit = 0;

		foreach ($this->sales as $s)
		{
			if($s->status = 0 && $s->payment_method = \App\Nay\PaymentMethod::Flexible)
			{

				$totalDebit += $item->price;
			}
		}

		return $totalDebit;
	}

	public function getTotalPaymentsAttribute()
	{
		$totalPayments = 0;

		foreach ($this->sales as $s)
		{
			if($s->status = 1)
			{
				$totalPayments += $item->price;
			}
		}

		return $totalPayments;
	}

}*/