<?php

namespace Alsharie\CashPayPayment;


use Alsharie\CashPayPayment\Responses\CashPayConfirmPaymentResponse;
use Alsharie\CashPayPayment\Responses\CashPayErrorResponse;
use Alsharie\CashPayPayment\Responses\CashPayInitPaymentResponse;
use Alsharie\CashPayPayment\Responses\CashPayOperationStatusResponse;

class CashPay extends CashPayAttributes
{


    /**
     * It Is used to allow the merchant to initiate a payment for a specific customer.
     * @return CashPayInitPaymentResponse|CashPayErrorResponse
     */
    public function initPayment()
    {
        // set `UserName`, and `SpId` .
        $this->setAuthAttributes();
        // set header info
        $this->setUnixtimestamp();
        $this->setEncPassword();
        $this->generateMDToken();

        if(!isset($this->attributes['CurrencyId'])){
            $this->attributes['CurrencyId']=2;//rial Yemeni
        }

        try {
            $response = $this->sendRequest(
                $this->getInitPaymentPath(),
                $this->attributes,
                $this->headers
            );

            return new CashPayInitPaymentResponse((string)$response->getBody());
        } catch (\Throwable $e) {
            return new CashPayErrorResponse($e->getMessage());
        }
    }


    /**
     * It is used to confirm the initPayment request
     * @return CashPayConfirmPaymentResponse|CashPayErrorResponse
     */
    public function confirmPayment()
    {
        // set `UserName`, and `SpId` .
        $this->setAuthAttributes();
        // set header info
        $this->setUnixtimestamp();
        $this->generateMDToken();

        try {
            $response = $this->sendRequest(
                $this->getConfirmPaymentPath(),
                $this->attributes,
                $this->headers
            );

            return new CashPayConfirmPaymentResponse((string)$response->getBody());
        } catch (\Throwable $e) {
            return new CashPayErrorResponse($e->getMessage());
        }
    }



    /**
     * It is used to check the state of an operation ( It is useful in cases of time out).
     * @return CashPayOperationStatusResponse|CashPayErrorResponse
     */
    public function operationStatus()
    {
        // set `UserName`, and `SpId` .
        $this->setAuthAttributes();
        // set header info
        $this->setUnixtimestamp();
        $this->setEncPassword();
        $this->generateMDToken();

        try {
            $response = $this->sendRequest(
                $this->getOperationStatusPath(),
                $this->attributes,
                $this->headers
            );

            return new CashPayOperationStatusResponse((string)$response->getBody());
        } catch (\Throwable $e) {
            return new CashPayErrorResponse($e->getMessage());
        }
    }

}