<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class AbstractRequest
 * @package Omnipay\AlfaBank\Message
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /**
     * Адрес тестового сервера
     * @var string
     */
    protected $testEndpoint = 'https://web.rbsuat.com/ab/rest';

    /**
     * Адрес продакшен сервера
     * @var string
     */
    protected $prodEndpoint = 'https://pay.alfabank.ru/payment/rest';

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }

    /**
     * @return bool
     */
    protected function getEndpoint(): string
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->prodEndpoint;
    }

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return 'POST';
    }

    /**
     * @return array
     */
    public function getAuthData(): array
    {
        if (empty($this->getToken())) {
            return [
                'userName' => $this->getParameter('userName'),
                'password' => $this->getParameter('password'),
            ];
        }

        return ['token' => $this->getToken()];
    }

    /**
     * Send the request with specified data
     *
     * @param  array $data The data to send
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $this->getHeaders(),
            http_build_query($data, '', '&')
        );
        $contents = $httpResponse->getBody()->getContents();

         return $this->createResponse($contents);
    }

    /**
     * Undocumented function
     *
     * @param [type] $fromContent
     * @return \Psr\Http\Message\ResponseInterface
     */
    abstract public function createResponse($fromContent);

    /**
     * @param string $value
     * @return AbstractRequest
     */
    public function setUserName(string $value)
    {
        return $this->setParameter('userName', $value);
    }

    /**
     * @param string $value
     * @return AbstractRequest
     */
    public function setPassword(string $value)
    {
        return $this->setParameter('password', $value);
    }

    /**
     * @param string $value
     * @return AbstractRequest
     */
    public function setLanguage(string $value): self
    {
        return $this->setParameter('language', $value);
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    /**
     * @param string $value
     * @return self
     */
    public function setOrderId(string $value): self
    {
        return $this->setParameter('orderId', $value);
    }

    /**
     *
     */
    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }
}
