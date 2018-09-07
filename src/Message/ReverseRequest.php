<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class ReverseRequest
 * @package Omnipay\AlfaBank\Message
 */
class ReverseRequest extends AbstractRequest
{
    /**
     * @return bool|string
     */
    public function getEndpoint(): string
    {
        return parent::getEndpoint() . '/reverse.do';
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
     * @return ReverseResponse
     */
    public function createResponse($fromContent)
    {
        return new ReverseResponse($this, $fromContent);
    }
}
