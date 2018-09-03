<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class AbstractRequest
 *
 * @package shop\components\payments\paynet\message
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
    public function getHeaders()
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * @return bool
     */
    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->prodEndpoint;
    }

    /**
     * @param string $service
     * @return string
     */
    public function createUrlTo(string $service): string
    {
        return $this->getEndpoint() . '/' . $service;
    }

    /**
     * @return array
     */
    public function getAuthData()
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
    public function setOrderNumber(string $value)
    {
        return $this->setParameter('orderNumber', $value);
    }
}
