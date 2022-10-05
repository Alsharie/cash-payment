<?php

namespace Alsharie\CashPayPayment\Facade;

use Illuminate\Support\Facades\Facade;
use Alsharie\CashPayPayment\CashPay;

class CashPayPaymentGateway extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     */
    protected static function getFacadeAccessor()
    {
        return CashPay::class;
    }
}