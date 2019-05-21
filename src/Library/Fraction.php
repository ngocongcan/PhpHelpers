<?php

namespace PhpHelpers\Library;

/**
 * Class Fraction
 * @package PhpHelpers\Library
 *
 * Using this format instead float number (0.001) to avoid inaccurate value
 * https://stackoverflow.com/questions/812815/php-intval-and-floor-return-value-that-is-too-low
 * Continued_fraction
 * https://en.wikipedia.org/wiki/Continued_fraction
 * http://jonisalonen.com/2012/converting-decimal-numbers-to-ratios/
 */
class Fraction
{


    const PATTERN_FROM_STRING = '#^(-?\d+)(?:(?: (\d+))?/(\d+))?$#';

    /**
     * @param float $number
     * @param int $precision Why default 14???
     * The number of significant digits displayed in floating point numbers default is 14 in php.ini
     * @return null|string
     */
    public static function decimal2Fraction($number, $precision = 14)
    {

        if (is_null($number)) {
            return null;
        }
        if ((floor($number) - $number) == 0) {
            return (string) floor($number); // integer value
        }
        $isNegative = $number < 0 ? -1 : 1 ;
        // Default round mode is PHP_ROUND_HALF_UP 0.4285714286,  If $precision $number = 0.428571 < 0.4285714
        // Increase $precision when rounding
        $number = round(abs($number), $precision + 1);
        $tolerance = pow(0.1, $precision);
        $h1 = 1;
        $h2 = 0;
        $k1 = 0;
        $k2 = 1;
        $b = 1/$number;
        do {
            $b = 1/$b;
            $a = floor($b);
            $aux = $h1;
            $h1 = $a*$h1+$h2;
            $h2 = $aux;
            $aux = $k1;
            $k1 = $a*$k1+$k2;
            $k2 = $aux;
            $b = $b-$a;
        } while (abs($number - $h1/$k1) >= ($number * $tolerance));
        $numerator = (int) $h1 * $isNegative;
        $denominator = (int) $k1;

        if ($numerator === $denominator) {
            return '1';
        }

        if (-1*$numerator === $denominator) {
            return '-1';
        }

        if (1 === $denominator) {
            return (string) $numerator;
        }

        if (abs($numerator) > abs($denominator)) {
            $whole = floor(abs($numerator) / $denominator);
            if ($numerator < 0) {
                $whole *= -1;
            }
            return sprintf(
                '%d %d/%d',
                $whole,
                abs($numerator % $denominator),
                $denominator
            );
        }
        return sprintf(
            '%d/%d',
            $numerator,
            $denominator
        );
    }

    /**
     * @param $string
     * @param int $precision
     * @return float
     */
    public static function fractionString2Decimal($string, $precision = 14)
    {

        if (preg_match(self::PATTERN_FROM_STRING, trim($string), $matches)) {
            if (2 === count($matches)) {
                // whole number
                return round(floatval($matches[1]), $precision);
            } else {
                // either x y/z or x/y
                if ($matches[2]) {
                    // x y/z
                    return round((intval($matches[1]) + (intval($matches[2])/ intval($matches[3])) ), $precision);
                }
                // x/y
                return  round(intval($matches[1])/ intval($matches[3]), $precision);
            }
        }
        return round(floatval($string), $precision);
    }
}
