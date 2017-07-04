<?php


namespace App\Nay\Model;

use Illuminate\Database\Eloquent\Model;


class ConfigurationsModel extends Model
{

	protected $table = 'configurations';


	protected $fillable = [
						    'system_name',
						    'fantasy_name',
						    'social_name',
						    'description',
						    'tags',
						    'email',
						    'address',
						    'postal_code',
						    'phone',
						    'cellphone',
						    'latitude',
						    'longitude',
						    'country_code',
						    'state_code',
						    'pagseguro_api_key',
						    'created_by',
						    'updated_by'
						];


	public $timestamps = true;


	protected $casts = ['tags' => 'array'];


	public function __construct()
	{

		//check if configuration row exists

		if($this->count() != 1)
		{
		    $this->system_name       = 'your-config-here';
		    $this->fantasy_name      = 'your-config-here';
		    $this->social_name       = 'your-config-here';
		    $this->description       = 'your-config-here';
		    $this->tags              = ['your-config-here'];
		    $this->email             = 'your-config-here';
		    $this->address           = 'your-config-here';
		    $this->postal_code       = 'your-config-here';
		    $this->phone             = 'your-config-here';
		    $this->cellphone         = 'your-config-here';
		    $this->latitude          = 'your-config-here';
		    $this->longitude         = 'your-config-here';
		    $this->country_code      = 'BR';
		    $this->state_code        = 'MA';
		    $this->pagseguro_api_key = 'your-config-here';
		    $this->created_by        = 1;
		    $this->updated_by        = 1;

		    $this->save();
		}
	}

	public function read($fieldName)
	{
		return $this->first()->$fieldName;
	}

	public function write($fieldName, $value)
	{	
		$config  = $this->first();

		$config->$fieldName = $value;

		return $config->save();
	}


}