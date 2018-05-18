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
							'pagseguro_cms_version_name',
							'pagseguro_module_version_name',
							'pagseguro_cms_version_release',
							'pagseguro_module_version_release',
							'pagseguro_environment',
							'pagseguro_email',
							'pagseguro_key',
							'pagseguro_charset',
							'cnpj',
							'administrator_system_email',
							'default_client_id',
						    'created_by',
						    'updated_by',
							'custom_field1_label',
				            'custom_field2_label',
				            'custom_field3_label',
				            'custom_field4_label',
				            'custom_field5_label',
				            'custom_field6_label'
						];


	public $timestamps = true;


	protected $casts = ['tags' => 'array'];


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

	public static function get()
	{
		return self::first();
	}

	/**
	* Retorna configurações consideradas publicas
	* configurações que podem ficar disponveis em páginas 
	* publicas do sistema
	*/
	public static function getPublic()
	{
		return self::select('message')->first();
	}

	public function getDatabaseInfo()
	{
		$results = \DB::select( \DB::raw("select version()") );

		return $results[0]->{'version()'};
	}
}