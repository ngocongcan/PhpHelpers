<?php

namespace PhpHelpers\Tests;

use PhpHelpers\Library\Fraction;

/**
 * Class FractionTest
 * @package PhpHelpers\Tests
 */
class FractionTest extends TestCase
{
    public function testFraction2Decimal()
    {
        $testValues = [null, '0', '1', '1/2', '1 1/2', '2/3', '3/7'];
        $result = [];
        $expected = [null, 0, 1, 0.5, 1.5, 0.6666666667, 0.4285714286];
        foreach ($testValues as $value) {
            $result[] = Fraction::fractionString2Decimal($value, 10);
        }
        $this->assertEquals($result, $expected);
    }

    public function testDecimal2Fraction()
    {

        $expected = [null, '0', '1', '1/2', '1 1/2', '2/3', '3/7'];
        $result = [];
        $testValues = [null, 0, 1,  0.5, 1.5, 0.6666666667, 0.4285714286];
        foreach ($testValues as $value) {
            $result[] = Fraction::decimal2Fraction($value, 8);
        }
        $this->assertEquals($result, $expected);
    }
}
