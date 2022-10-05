<?php

namespace Alsharie\CashPayPayment\Responses;


class CashPayOperationStatusResponse extends CashPayResponse
{

    /**
     * @return string
     */
    public function getStatus()
    {
        if (!empty($this->data['Status'])) {
            return $this->data['Status'];
        }

        return false;
    }
}