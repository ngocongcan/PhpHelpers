<?php

namespace PhpHelpers\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package PhpHelpers\Tests
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * Indicates if we have made it through the base setUp function.
     *
     * @var bool
     */
    protected $setUpHasRun = false;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->setUpHasRun = true;
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        $this->setUpHasRun = false;
    }
}
