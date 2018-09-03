<?php

namespace Omnipay\AlfaBank\Message;

use Omnipay\Common\Message\ResponseInterface;

/**
 * Class PaynetAuthorizeRequest
 * @package shop\components\payments\messages
 */
class AuthorizeRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $service = 'registerPreAuth.do';

    /**
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('amount', 'orderNumber');
        $data = array_merge(
            $this->getAuthData(),
            [
                'amount' => $this->getAmountInteger(),
                'returnUrl' => $this->getReturnUrl(),
                'description' => $this->getDescription(),
                'orderNumber' => $this->getParameter('orderNumber'),
            ]
        );

        return $data;
    }

    /**
     * Send the request with specified data
     *
     * @param  array $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            'POST',
            $this->createUrlTo($this->service),
            $this->getHeaders(),
            json_encode($data)
        );

        return $this->response = new AuthorizeResponse(
            $this,
            json_decode($httpResponse->getBody()->getContents(), true)
        );
    }
}
