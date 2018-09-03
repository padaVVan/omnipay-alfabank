<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class RefundRequest
 * @package shop\components\payments\paynet\message
 */
class RefundRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $service = 'getOrderStatusExtended.do ';

    /**
     * @return mixed
     */
    public function getData()
    {
        return array_merge(
            $this->getAuthData(),
            [
                'orderId' => $this->getParameter('orderId'),
                'amount' => $this->getAmountInteger(),
            ]
        );
    }

    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return RefundResponse
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            'POST',
            $this->createUrlTo($this->service),
            $this->getHeaders(),
            json_encode($data)
        );

        return $this->response = new RefundResponse(
            $this,
            json_decode($httpResponse->getBody()->getContents(), true)
        );
    }

    /**
     * @param $value
     * @return self
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
