<?php

namespace Omnipay\AlfaBank;

/**
 * Class StatusEnum
 * @package Omnipay\AlfaBank
 */
class StatusEnum
{
    /**
     * Заказ зарегистрирован, но не оплачен
     */
    const REGISTERED = 0;

    /**
     * Предавторизованная сумма захолдирована (для двухстадийных платежей)
     */
    const AUTHORIZED = 1;

    /**
     * Проведена полная авторизация суммы заказа
     * @var int
     */
    const DEPOSITED = 2;

    /**
     * Авторизация отменена
     */
    const REVERSED = 3;

    /**
     * По транзакции была проведена операция возврата
     */
    const REFUNDED = 4;

    /**
     * Инициирована авторизация через ACS банка-эмитента
     */
    const ACS_EMIT = 5;

    /**
     * Авторизация отклонена
     */
    const REJECTED = 6;
}
