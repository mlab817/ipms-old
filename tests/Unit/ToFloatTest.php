<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ToFloatTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_returns_float_from_number_with_comma()
    {
        $numberToConvert = '1,234,567,890';
        $converted = toFloat($numberToConvert);
        $expected = (float) 1234567890;
        $this->assertEquals($expected, $converted);
    }
}
