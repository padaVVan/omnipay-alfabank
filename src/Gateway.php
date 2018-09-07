<?php

namespace Omnipay\AlfaBank;

use Omnipay\AlfaBank\Message\AuthorizeRequest;
use Omnipay\AlfaBank\Message\CaptureRequest;
use Omnipay\AlfaBank\Message\PurchaseRequest;
use Omnipay\AlfaBank\Message\RefundRequest;
use Omnipay\AlfaBank\Message\StatusRequest;

/**
 * Class Gateway
 * @property string $userName Логин мерчанта
 * @property string $password Пароль мерчанта
 * @package Omnipay/Alfabank
 * @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = [])
 */
class Gateway extends \Omnipay\Common\AbstractGateway
{
    /**
     * @param array $options
     * @return AuthorizeRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function authorize(array $options = [])
    {
        return $this->createRequest(AuthorizeRequest::class, $options);
    }

    /**
     * @param array $options
     * @return CaptureRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function capture(array $options = [])
    {
        return $this->createRequest(CaptureRequest::class, $options);
    }

    /**
     * @param array $options
     * @return PurchaseRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function purchase(array $options = [])
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * @param array $options
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function fetchTransaction(array $options = [])
    {
        return $this->createRequest(StatusRequest::class, $options);
    }

    public function status(array $options = [])
    {
        return $this->createRequest(StatusRequest::class, $options);
    }

    /**
     * @param array $options
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function refund(array $options = [])
    {
        return $this->createRequest(RefundRequest::class, $options);
    }

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'AlfaBank';
    }

    /**
     * @param string $value
     * @return Gateway
     */
    public function setUserName(string $value): self
    {
        return $this->setParameter('userName', $value);
    }

    /**
     * @param string $value
     * @return Gateway
     */
    public function setPassword(string $value): self
    {
        return $this->setParameter('password', $value);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
    }
}
