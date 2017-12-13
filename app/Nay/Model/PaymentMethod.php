<?php


namespace App\Nay\Model;


class PaymentMethod extends \SplEnum
{
    const __default = self::Money;
    
	const Money     = 0;
	const CredtCard = 1;
	const Flexlible = 2;
}