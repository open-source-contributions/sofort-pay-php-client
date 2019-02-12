<?php

namespace SofortPay\Request\Traits;

use Money\Money;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\DecimalMoneyFormatter;

/**
 * Class AmountFormatterTrait.
 */
trait AmountFormatterTrait
{
    /**
     * @param Money $money
     *
     * @return float
     */
    protected function formatToFloat(Money $money): float
    {
        $formatter = new DecimalMoneyFormatter(new ISOCurrencies());

        return floatval($formatter->format($money));
    }
}
