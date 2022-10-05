<?php

namespace Alsharie\CashPayPayment\Responses;


class CashPayResponse
{
    protected $success = true;
    /**
     * Store the response data.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Response constructor.
     */
    public function __construct($response)
    {
        $this->data = json_decode($response, true);
    }


    /**
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @return array
     */
    public function body()
    {
        return $this->data;
    }

    public function isSuccess()
    {
        if (isset($this->data['ResultCode']) && $this->data['ResultCode'] == 1) {

            return $this->success;
        }
        return false;
    }

    public function message()
    {
        if (isset($this->data['ResultMessage'])) {

            return $this->data['ResultMessage'];
        }

        return $this->data['Message'];
    }


    public function errorMessage()
    {
        if (isset($this->data['Message'])) {
            $errorCode = $this->data['Message'];

            if (!isset(CashPayResponseCode::$codes[$errorCode]))
                $errorCode = '9999';

            return CashPayResponseCode::$codes[$errorCode];
        }
    }

    /**
     *  1 means successes -1 failed
     * @return mixed|void
     */
    public function code()
    {
        if (isset($this->data['ResultCode'])) {
            return $this->data['ResultCode'];
        }
    }


    public function requestId()
    {
        if (isset($this->data['RequestId'])) {
            return $this->data['RequestId'];
        }
    }


}