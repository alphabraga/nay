<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class ClientsModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'clients';

	protected $imagePath = 'public/images/clients/';

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


    /*
		O sistema deve permitir o cadastro do cliente apenas com o nome 
		para facilitar o cadastro. Mas deve ser feita essa checagem 
		antes de ser realizada a venda online
    */
    public function isValidForOnlineShopping()
    {

    	return false;
    }

    /*
		O sistema deve permitir o cadastro do cliente apenas com o nome 
		para facilitar o cadastro. Mas deve ser feita essa checagem antes 
		de ser realizada a venda pelo cartao de credito
    */
    public function isValidForCreditCardShopping()
    {

    	return false;
    }


}