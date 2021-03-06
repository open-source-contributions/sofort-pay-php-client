<?php

declare(strict_types=1);

namespace SofortPay\Tests\ValueObject;

use PHPUnit\Framework\TestCase;
use SofortPay\ValueObject\Language;
use SofortPay\Exception\InvalidLanguageException;

/**
 * Class LanguageTest.
 */
class LanguageTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     *
     * @param string $value
     *
     * @throws InvalidLanguageException
     */
    public function testSuccess($value)
    {
        $currency = new Language($value);

        self::assertEquals($value, (string) $currency);
    }

    /**
     * @return array
     */
    public function successDataProvider()
    {
        $result = [];
        foreach (getSofortPaySupportsLanguages() as $lang => $title) {
            $result[] = [$lang];
        }

        return $result;
    }

    /**
     * @throws InvalidLanguageException
     */
    public function testInvalidValue()
    {
        self::expectException(InvalidLanguageException::class);
        self::expectExceptionMessage('Not accepted language by Sofort Pay.');

        new Language('test');
    }
}
