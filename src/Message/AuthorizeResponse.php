<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class Response
 * @package shop\components\payments\paynet\message
 */
class AuthorizeResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return (int)$this->data->get('errorCode', -1) === 0;
    }

    /**
     * @inheritdoc
     * @return bool
     */
    public function isPending()
    {
        return false;
    }

    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isRedirect()
    {
        return boolval($this->getRedirectUrl());
    }

    /**
     * Is the transaction cancelled by the user?
     *
     * @return boolean
     */
    public function isCancelled()
    {
        return (bool)$this->getCode();
    }

    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return (int)$this->data->get('errorCode');
    }

    /**
     * Gateway Reference
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        return $this->data->get('orderId');
    }

    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->data->get('formUrl', null);
    }

    /**
     * Get the required redirect method (either GET or POST).
     *
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     *
     * @return array
     */
    public function getRedirectData()
    {
        return [];
    }

    /**
     * Perform the required redirect.
     *
     * @return void
     */
    public function redirect()
    {
        // TODO: Implement redirect() method.
    }
}
