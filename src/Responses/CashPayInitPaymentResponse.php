<?php

namespace Alsharie\CashPayPayment\Responses;


class CashPayInitPaymentResponse extends CashPayResponse
{

    /**
     * @return string
     */
    public function getTransactionRef()
    {
        if (!empty($this->data['TransactionRef'])) {
            return $this->data['TransactionRef'];
        }

        return false;
    }


}