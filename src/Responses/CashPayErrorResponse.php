<?php

namespace Alsharie\CashPayPayment\Responses;


class CashPayErrorResponse extends CashPayResponse
{
    protected $success = false;

    public function __construct($response, $status)
    {
        $this->data = (array) json_decode($response);
        $this->data['status_code'] = $status;
    }


}