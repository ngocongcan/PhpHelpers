<?php

namespace PhpHelpers\Tests;
use PhpHelpers\Library\Currency;

/**
 * Class CurrencyTest
 * @package PhpHelpers\Tests
 */
final class CurrencyTest extends TestCase
{
    protected $currency;
	protected function setUp(): void
	{
        parent::setUp();
		$this->currency = new Currency('USD');
	}
	/**
	 * Test getters
	 *
	 * @test
	 * @return void
	 */
	public function testItCanGetCurrencyData()
	{
		$this->assertEquals($this->currency->getCode(), 'USD');
		$this->assertEquals($this->currency->getSymbol(), '$');
		$this->assertEquals($this->currency->getPrecision(), 2);
		$this->assertEquals($this->currency->getTitle(), 'US Dollar');
		$this->assertEquals($this->currency->getThousandSeparator(), ',');
		$this->assertEquals($this->currency->getDecimalSeparator(), '.');
		$this->assertEquals($this->currency->getSymbolPlacement(), 'before');
	}
	/**
	 * String can be parsed to numeric
	 *
	 * @test
	 * @return void
	 */
	public function testItCanGetAllCurrencies()
	{
		$this->assertTrue(is_array(Currency::getAllCurrencies()));
	}
}
