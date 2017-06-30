<?php


namespace App\Nay\PaymentGateway;

class PagSeguro
{
	
	public function __construct()
	{

		$config = new \App\Nay\Model\ConfigurationsModel();

		\PagSeguro\Library::initialize();
		\PagSeguro\Library::cmsVersion()
		->setName($config->read('pagseguro_cms_version_name'))
		->setRelease($config->read('pagseguro_cms_version_release'));
		
		\PagSeguro\Library::moduleVersion()
		->setName($config->read('pagseguro_module_version_name'))
		->setRelease($config->read('pagseguro_module_version_release'));

		/*
		 * To do a dynamic configuration of the library credentials you have to use the set methods
		 * from the static class \PagSeguro\Configuration\Configure. 
		 */

		//For example, to configure the library dynamically:
		\PagSeguro\Configuration\Configure::setEnvironment($config->read('pagseguro_environment'));//production or sandbox
		\PagSeguro\Configuration\Configure::setAccountCredentials(
		    $config->read('pagseguro_email'),
		    $config->read('pagseguro_key')
		);

		// UTF-8 or ISO-8859-1
		\PagSeguro\Configuration\Configure::setCharset($config->read('pagseguro_charset'));

		//\PagSeguro\Configuration\Configure::setLog(true, '/logpath/logFilename.log');

		try {
		    /**
		     * @todo For use with application credentials use:
		     * \PagSeguro\Configuration\Configure::getApplicationCredentials()
		     *  ->setAuthorizationCode("FD3AF1B214EC40F0B0A6745D041BFDDD")
		     */
		    $sessionCode = \PagSeguro\Services\Session::create(
		        \PagSeguro\Configuration\Configure::getAccountCredentials()
		    );

		    echo "ID de sessão criado: {$sessionCode->getResult()}";
		}
		catch (Exception $e)
		{
		    die($e->getMessage());
		}
	}
}