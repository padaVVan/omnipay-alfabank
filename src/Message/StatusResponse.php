<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class StatusResponse
 * @package Omnipay\AlfaBank\Message
 */
class StatusResponse extends AbstractResponse
{
    const STATUS_REVERSE = 3;

    const STATUS_REFUND = 4;

    /**
     * @inheritdoc
     * @return bool
     */
    public function isSuccessful()
    {
        return !$this->getCode();
    }

    /**
     * Is the transaction cancelled by the user?
     *
     * @return boolean
     */
    public function isCancelled()
    {
        return in_array(
            $this->getOrderStatus(),
            [self::STATUS_REVERSE, self::STATUS_REFUND]
        );
    }

    /**
     * @return mixed
     */
    public function getOrderStatus()
    {
        return $this->getData()->get('OrderStatus');
    }
}
