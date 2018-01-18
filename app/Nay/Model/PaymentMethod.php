<?php


namespace App\Nay\Model;


abstract class  PaymentMethod
{
    const __default = self::Money;
    
	const Money      = 0;
	const CreditCard = 1;
	const Flexible   = 2;

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

//$paymentMethod = PaymentMethod::Money;