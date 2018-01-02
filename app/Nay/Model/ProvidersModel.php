<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class ProvidersModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'providers';

	protected $imagePath = 'public/images/providers/';

	protected $fillable = [
							'id', 
							'slug', 
							'name',
							'color',
							'description', 
							'personal_contact',
							'postal_code',
							'address',
							'address_number',
							'address_complement',
							'phone',
							'cellphone',
							'email',
							'site',
							'deleted_by',
							'deleted_at'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;

	protected $casts = ['tags' => 'array'];

    public function brands()
    {
        return $this->hasMany('App\Nay\Model\BrandsModel', 'provider_id', 'id');
    }

}