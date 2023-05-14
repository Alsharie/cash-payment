<?php

namespace Alsharie\CashPayPayment;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Guzzle
{
    /**
     * Store guzzle client instance.
     *
     * @var CashPay
     */
    protected $guzzleClient;

    /**
     * CashPay payment base path.
     *
     * @var string
     */
    protected $basePath;

    /**
     * Store CashPay payment endpoint.
     *
     * @var string
     */
    protected $endpoint;

    /**
     * BaseService Constructor.
     */
    public function __construct()
    {
        $this->guzzleClient = new Client();
        $this->basePath = config('cashPay.url.base');
    }


    /**
     * @param $path
     * @param $attributes
     * @param string $method
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function sendRequest($path, $attributes, $headers, $security = [], string $method = 'POST'): ResponseInterface
    {
        return $this->guzzleClient->request(
            $method,
            $path,
            [
                'headers' => array_merge(
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $headers
                ),
                'cert' => [
                    config('cashPay.cert.path'),
                    config('cashPay.cert.password')
                ],
                'json' => $attributes,
                ...$security
            ]
        );
    }


    protected function getInitPaymentPath(): string
    {
        return $this->basePath . '/' . "CashPG/api/CashPay/InitPayment";
    }


    protected function getConfirmPaymentPath(): string
    {
        return $this->basePath . '/' . "CashPG/api/CashPay/ConfirmPayment";
    }


    protected function getOperationStatusPath(): string
    {
        return $this->basePath . '/' . "CashPG/api/Operation/OperationStatus";
    }


}