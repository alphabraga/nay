<?php


namespace App\Nay\Model;


abstract class  PaymentMethod
{
    const __default = self::Money;
    
	const Money     = 0;
	const CreditCard = 1;
	const Flexlible = 2;

	static function getAll()
	{
        $class = new \ReflectionClass(__CLASS__);

        $constants = $class->getConstants();

        unset($constants['__default']);

        return $constants;
    }

}

//$paymentMethod = PaymentMethod::Money;