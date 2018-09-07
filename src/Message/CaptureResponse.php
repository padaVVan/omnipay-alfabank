<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class CaptureResponse
 * @package Omnipay\AlfaBank\Message
 */
class CaptureResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     * @return bool
     */
    public function isSuccessful()
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
        return false;
    }

    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return $this->data->get('errorCode');
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
