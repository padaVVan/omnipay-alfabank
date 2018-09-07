<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class PurchaseRequest
 * @package Omnipay\AlfaBank\Message
 */
class PurchaseRequest extends RegisterRequest
{
    /**
     * @inheritdoc
     * @return string
     */
    public function getEndpoint(): string
    {
        return parent::getEndpoint() . '/register.do';
    }

    /**
     * @param string $contents
     * @return PurchaseResponse
     */
    public function createResponse($contents)
    {
        return $this->response = new PurchaseResponse($this, $contents);
    }
}
