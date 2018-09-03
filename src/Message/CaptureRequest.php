<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class CaptureRequest
 * @package shop\components\payments\paynet\message
 */
class CaptureRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $service = 'deposit.do';

    /**
     * @return mixed
     */
    public function getData()
    {
        return array_merge(
            $this->getAuthData(),
            [
                'amount' => $this->getAmountInteger(),
                'orderId' => $this->getParameter('orderId'),
            ]
        );
    }

    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return CaptureResponse
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            'POST',
            $this->createUrlTo($this->service),
            $this->getHeaders(),
            json_encode($data)
        );

        return $this->response = new CaptureResponse(
            $this,
            json_decode($httpResponse->getBody()->getContents(), true)
        );
    }

    /**
     * @param $value
     * @return CaptureRequest
     */
    public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }
}
