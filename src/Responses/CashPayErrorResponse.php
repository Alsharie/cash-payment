<?php

namespace Alsharie\CashPayPayment\Responses;


class CashPayErrorResponse extends CashPayResponse
{
    protected $success = false;

    public function __construct($response)
    {
        parent::__construct($response);
        $this->data = $response;
    }

}