<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class CaptureRequest
 * @package Omnipay\AlfaBank\Message
 */
class CaptureRequest extends AbstractRequest
{
    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return parent::getEndpoint() . '/deposit.do';
    }

    /**
     * @param string $contents
     * @return CaptureResponse
     */
    public function createResponse($contents)
    {
        return $this->response = new CaptureResponse($this, $contents);
    }

    /**
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('amount', 'orderId');

        return array_merge(
            $this->getAuthData(),
            [
                'amount' => $this->getAmountInteger(),
                'orderId' => $this->getParameter('orderId'),
            ]
        );
    }
}
