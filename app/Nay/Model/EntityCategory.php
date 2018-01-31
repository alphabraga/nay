<?php


namespace App\Nay\Model;

abstract class EntityCategory
{
	const __default = self::Client;

	const Client                = 0;
	const Company               = 1;
	const ClientAndCompany      = 2;


	static function getAll()
	{
        $class = new \ReflectionClass(__CLASS__);

        $constants = $class->getConstants();

        unset($constants['__default']);

        return $constants;
    }

    /**
    * Return the constant name using the value
    * Usefull when you need the get the name of the PaymentMethod over the database
    */
    static function name($value)
    {
        $constants = self::getAll();

        return array_search($value, $constants);
    }

}

//$saleCategory = SaleCategory::Order;