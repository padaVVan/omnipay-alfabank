<?php

namespace Omnipay\AlfaBank\Message;

use Omnipay\AlfaBank\StatusEnum;

/**
 * Class StatusResponse
 * @package Omnipay\AlfaBank\Message
 */
class StatusResponse extends AbstractResponse
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
     * Is the transaction cancelled by the user?
     *
     * @return boolean
     */
    public function isCancelled()
    {
        return in_array(
            $this->getOrderStatus(),
            [StatusEnum::REVERSED, StatusEnum::REFUNDED]
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
