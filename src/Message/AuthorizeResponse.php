<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class AuthorizeResponse
 * @package Omnipay\AlfaBank\Message
 */
class AuthorizeResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return !$this->getCode();
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
    public function isRedirect(): bool
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
        return false;
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
