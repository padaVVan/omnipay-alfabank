<?php

namespace Omnipay\AlfaBank;

/**
 * Class Helper
 * @package Omnipay\AlfaBank
 */
class Helper
{
    /**
     * @param array $map
     * @return array
     */
    public static function onlySetted(array $map)
    {
        return array_filter($map, function ($e) {
            return $e !== null;
        });
    }
}
