<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class StatusRequest
 * @package Omnipay\AlfaBank\Message
 */
class StatusRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     * @return bool|string
     */
    public function getEndpoint(): string
    {
        return parent::getEndpoint() . '/getOrderStatusExtended.do';
    }

    /**
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('orderId');

        return array_merge(
            $this->getAuthData(),
            [
                'orderId' => $this->getParameter('orderId'),
                'language' => $this->getLanguage(),
            ]
        );
    }

    /**
     * Undocumented function
     *
     * @param [type] $fromContent
     * @return StatusResponse
     */
    public function createResponse($fromContent)
    {
        return new StatusResponse($this, $fromContent);
    }
}
