<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class RegisterRequest
 * @package Omnipay\AlfaBank\Message
 */
abstract class RegisterRequest extends AbstractRequest
{
    /**
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('amount', 'orderNumber', 'returnUrl');

        $required = [
            'amount' => $this->getAmountInteger(),
            'returnUrl' => $this->getReturnUrl(),
            'orderNumber' => $this->getOrderNumber(),
        ];

        $additional = \Omnipay\AlfaBank\Helper::onlySetted([
            'currency' => $this->getCurrency(),
            'ip' => $this->getIp(),
            'language' => $this->getLanguage(),
            'description' => $this->getDescription(),
            'failUrl' => $this->getFailUrl(),
            'pageView' => $this->getPageView(),
            'clientId' => $this->getClientId(),
            'merchantLogin' => $this->getMerchantLogin(),
            'email' => $this->getEmail(),
            'postAddress' => $this->getPostAddress(),
            'jsonParams' => $this->getJsonParams(),
            'sessionTimeoutSecs' => $this->getSessionTimeoutSecs(),
            'expirationDate' => $this->getExpirationDate(),
            'autocompletionDate' => $this->getAutocompletionDate(),
            'bindingId' => $this->getBindingId(),
            'orderBundle' => $this->getOrderBundle(),
            'features' => $this->getFeatures(),
        ]);

        return array_merge($this->getAuthData(), $additional, $required);
    }

    /**
     * @param string $value
     * @return self
     */
    public function setIp(string $value): self
    {
        return $this->setParameter('ip', $value);
    }

    /**
     * @return string|null
     */
    public function getIp()
    {
        return $this->getParameter('ip');
    }

    /**
     * @param string $value
     * @return self
     */
    public function setPageView(string $value): self
    {
        if (!in_array($value, ['DESCTOP', 'VIEW'])) {
            $value = 'DESCTOP';
        }

        return $this->setParameter('pageView', $value);
    }

    /**
     * @return mixed
     */
    public function getPageView()
    {
        return $this->getParameter('pageView');
    }

    /**
     * @param $value
     * @return self
     */
    public function setClientId($value): self
    {
        return $this->setParameter('clientId', $value);
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->getParameter('clientId');
    }

    //
    public function setMerchantLogin($value): self
    {
        return $this->setParameter('merchantLogin', $value);
    }

    public function getMerchantLogin()
    {
        return $this->getParameter('merchantLogin');
    }

    public function setEmail(string $value): self
    {
        return $this->setParameter('email', $value);
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setPostAddress(string $value): self
    {
        return $this->setParameter('postAddress', $value);
    }

    public function getPostAddress()
    {
        return $this->getParameter('postAddress');
    }

    public function setJsonParams($value): self
    {
        return $this->setParameter('jsonParams', $value);
    }

    public function getJsonParams()
    {
        return $this->getParameter('jsonParams');
    }

    public function setSessionTimeoutSecs($value): self
    {
        return $this->setParameter('sessionTimeoutSecs', $value);
    }

    public function getSessionTimeoutSecs()
    {
        return $this->getParameter('sessionTimeoutSecs');
    }

    public function setExpirationDate($value): self
    {
        return $this->setParameter('expirationDate', $value);
    }

    public function getExpirationDate()
    {
        return $this->getParameter('expirationDate');
    }

    public function setAutocompletionDate($value): self
    {
        return $this->setParameter('autocompletionDate', $value);
    }

    public function getAutocompletionDate()
    {
        return $this->getParameter('autocompletionDate');
    }

    public function setBindingId($value): self
    {
        return $this->setParameter('bindingId', $value);
    }

    public function getBindingId()
    {
        return $this->getParameter('bindingId');
    }

    public function setOrderBundle($value): self
    {
        return $this->setParameter('orderBundle', $value);
    }

    public function getOrderBundle()
    {
        return $this->getParameter('orderBundle');
    }

    public function setFeatures($value): self
    {
        if (!\in_array($value, ['AUTO_PAYMENT', 'VERIFY'])) {
            $value = null;
        }

        return $this->setParameter('features', $value);
    }

    public function getFeatures()
    {
        return $this->getParameter('features');
    }

    public function setFailUrl(string $value): self
    {
        return $this->setParameter('failUrl', $value);
    }

    public function getFailUrl()
    {
        return $this->getParameter('failUrl');
    }

    /**
     * @param string $value
     * @return self
     */
    public function setOrderNumber(string $value): self
    {
        return $this->setParameter('orderNumber', $value);
    }

    /**
     * @param string $value
     * @return self
     */
    public function getOrderNumber()
    {
        return $this->getParameter('orderNumber');
    }
}
