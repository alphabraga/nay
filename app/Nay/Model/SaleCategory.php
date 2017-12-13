<?php


namespace App\Nay\Model;


class SaleCategory extends \SplEnum
{
    const __default = self::Comun;
    
	const Comun     = 0:
	const Budget    = 1;
	const Order     = 2;
}