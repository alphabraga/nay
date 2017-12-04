<?php

use Illuminate\Database\Seeder;

class ConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Nay\Model\ConfigurationsModel::create([
							'system_name'                      => 'Sistema Nay',
							'fantasy_name'                     => 'Nome Fantasia da Sua Empresa',
							'social_name'                      => 'Razao Social da sua Empresa',
							'description'                      => 'Uma breve descriçao sobre a sua empresa',
							'tags'                             => ['palavras', 'imortantes', 'que', 'definem', 'seu', 'negocio'],
							'email'                            => 'seu@email.com',
							'address'                          => 'Seu Endereço',
							'postal_code'                      => '000-00',
							'phone'                            => '55 (00) 00000000',
							'cellphone'                        => '55 (00) 000000000',
							'latitude'                         => '-3641531',
							'longitude'                        => '54313213',
							'country_code'                     => 'BR',
							'state_code'                       => 'MA',
							'pagseguro_cms_version_name'       => 'nay-0.0.1-beta', 
							'pagseguro_module_version_name'    => 'nay-0.0.1-beta',
							'pagseguro_cms_version_release'    => 'nay-0.0.1-beta',
							'pagseguro_module_version_release' => 'nay-0.0.1-beta',
							'pagseguro_environment'            => 'development',
							'pagseguro_email'                  => 'seu@email.com',
							'pagseguro_key'                    => '###########################',
							'pagseguro_api_key'                => '############################',
							'pagseguro_charset'                => 'UTF8',
							'cnpj'                             => '###########################',
							'administrator_system_email'       => 'seu@email.com',
							'created_by'                       => 1,
							'updated_by'                       => 1,
							'created_at'                       => \Carbon\Carbon::now() 
						]);

    }
}
