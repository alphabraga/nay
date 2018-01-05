<?php


namespace App\Nay\Model;

abstract class SaleCategory
{
	const __default = self::Comun;

	const Comun     = 0;
	const Budget    = 1;
	const Order     = 2;


	static function getAll()
	{
        $class = new \ReflectionClass(__CLASS__);

        $constants = $class->getConstants();

        unset($constants['__default']);

        return $constants;

    }

}

//$saleCategory = SaleCategory::Order;