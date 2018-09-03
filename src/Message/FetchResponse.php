<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class FetchResponse
 * @package Omnipay\AlfaBank\Message
 */
class FetchResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     * @return bool
     */
    public function isSuccessful()
    {
        return in_array($this->data->get('OrderStatus'), [1, 2]);
    }

    /**
     * @inheritdoc
     * @return bool
     */
    public function isPending()
    {
        return in_array($this->data->get('OrderStatus'), [0, 1, 5]);
    }

    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isRedirect()
    {
        return false;
    }

    /**
     * Is the transaction cancelled by the user?
     *
     * @return boolean
     */
    public function isCancelled()
    {
        return (bool)$this->getCode() || in_array($this->data->get('OrderStatus'), [3, 4, 6]);
    }

    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return $this->data->get('ErrorCode');
    }

    /**
     * Gateway Reference
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        return null;
    }

    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return null;
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
