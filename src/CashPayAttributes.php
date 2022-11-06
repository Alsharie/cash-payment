<?php

namespace Alsharie\CashPayPayment;


class CashPayAttributes extends Guzzle
{

    /**
     * Store request attributes.
     */
    protected array $attributes = [];

    protected array $headers = [];
    protected array $security = [];
    protected array $temp = [];

    public function disableVerify()
    {
        $this->security['verify'] = false;
        return $this;
    }

    protected function setUnixtimestamp()
    {
        $this->headers['unixtimestamp'] = floor(microtime(true) * 1000);
    }


    /**
     * equest unique identifier that should be generated by sp
     * @param $requestId
     * @return CashPayAttributes
     */
    public function setRequestId($requestId): CashPayAttributes
    {
        $this->attributes['RequestID'] = $requestId;
        return $this;
    }


    /**
     * Cash Customer account(it should be provided by customer = his mobile No)
     * @param $phone
     * @return CashPayAttributes
     */
    public function setCustomerPhone($phone): CashPayAttributes
    {
        $this->attributes['TargetMSISDN'] = $phone;
        return $this;
    }


    /**
     * Cash Customer account(it should be provided by customer = his mobile No)
     * @param $phone
     * @return CashPayAttributes
     */
    public function setTargetMSISDN($phone): CashPayAttributes
    {
        return $this->setCustomerPhone($phone);
    }


    /**
     * Cash Customer’s Cash Pay Code(it should be provided by customer, He will get it from within the Cash app, for more protection purposes)
     * @param $code
     * @return CashPayAttributes
     */
    public function setCustomerCashPayCode($code): CashPayAttributes
    {
        $this->attributes['CustomerCashPayCode'] = $code;
        return $this;
    }


    /**
     * @param $amount
     * @return CashPayAttributes
     */
    public function setAmount($amount): CashPayAttributes
    {
        $this->attributes['Amount'] = $amount;
        return $this;
    }


    /**
     * Cash team will provide u upon request
     * 2= Rial Yemeni
     * 4= Dollar
     * 5= Rial Saudi
     * @param $CurrencyId
     * @return CashPayAttributes
     */
    public function setCurrency($CurrencyId): CashPayAttributes
    {
        $this->attributes['CurrencyId'] = $CurrencyId;
        return $this;
    }


    /**
     * @param $desc
     * @return CashPayAttributes
     */
    public function setDescription($desc): CashPayAttributes
    {
        $this->attributes['Desc'] = $desc;
        return $this;
    }


    /**
     * Transaction Code returned in InitPayment response
     * @param $refId
     * @return CashPayAttributes
     */
    public function setTransactionRef($refId): CashPayAttributes
    {
        $this->attributes['TransactionRef'] = $refId;
        return $this;
    }


    /**
     * it’s 6 digit and unique we sent it to customer phone via SMS
     * when you use purchase request API.
     * @param $otp
     * @return CashPayAttributes
     */
    public function setOtp($otp): CashPayAttributes
    {
        $this->temp['otp'] = $otp;
        return $this;
    }


    /**
     * @param array $attributes
     * @return CashPayAttributes
     */
    public function setAttributes(array $attributes): CashPayAttributes
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @param array $attributes
     *
     * @return CashPayAttributes
     */
    public function mergeAttributes(array $attributes): CashPayAttributes
    {
        $this->attributes = array_merge($this->attributes, $attributes);
        return $this;
    }

    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return CashPayAttributes
     */
    public function setAttribute($key, $value): CashPayAttributes
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    /**
     * @param mixed $key
     *
     * @return boolean
     */
    public function hasAttribute($key): bool
    {
        return isset($this->attributes[$key]);
    }

    /**
     * @param mixed $key
     *
     * @return CashPayAttributes
     */
    public function removeAttribute($key): CashPayAttributes
    {
        $this->attributes = array_filter($this->attributes, function ($name) use ($key) {
            return $name !== $key;
        }, ARRAY_FILTER_USE_KEY);

        return $this;
    }


    /**
     * @return void
     */
    protected function setAuthAttributes()
    {
        $this->attributes['UserName'] = config('cashPay.auth.UserName');
        $this->attributes['SpId'] = config('cashPay.auth.SpId');
    }


    /**
     * @return void
     */
    protected function setEncPassword()
    {
        $this->headers['encPassword'] = config('cashPay.auth.encPassword');
    }


    /**
     * md5(spId+username+unixtimestamp)
     * @return void
     */
    protected function generateMDToken()
    {
        $this->attributes['MDToken'] = hash('md5', $this->attributes['SpId'] . $this->attributes['UserName'] . $this->headers['unixtimestamp']);
    }


    /**
     * md5(TransactionRef+OTP)
     * @return void
     */
    protected function generateTRCode()
    {
        $this->attributes['MDToken'] = hash('md5', $this->attributes['TransactionRef'] + $this->temp['otp']);
    }

}