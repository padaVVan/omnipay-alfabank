<?php

namespace Omnipay\AlfaBank\Message;

use Omnipay\Common\Message\RequestInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class AbstractResponse
 * @package Omnipay\AlfaBank\Message
 */
abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{
    /**
     * The data contained in the response.
     *
     * @var ParameterBag
     */
    protected $data;

    /**
     * Constructor
     *
     * @param RequestInterface $request the initiating request.
     * @param string $data JSON string
     */
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, []);

        $this->request = $request;
        $this->data = new ParameterBag(json_decode($data, true));
    }

    /**
     * Get the response data.
     *
     * @return ParameterBag
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return $this->data->get('errorMessage');
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
}