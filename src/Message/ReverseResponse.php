<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class ReverseResponse
 * @package Omnipay\AlfaBank\Message
 */
class ReverseResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     * @return bool
     */
    public function isSuccessful()
    {
        return !$this->getCode();
    }
}
