<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/class/calculator.php';

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    /**
     * @test
     */
    public function testAdd()
    {
        $result = $this->calculator->calculate(5.0, 3.0, "add");
        $this->assertEquals("4", $result);
    }

    /**
     * @test
     */
    public function testSubtract()
    {
        $result = $this->calculator->calculate(10.0, 4.0, "subtract");
        $this->assertEquals("6", $result);
    }

    /**
     * @test
     */
    public function testMultiply()
    {
        $result = $this->calculator->calculate(6.0, 7.0, "multiply");
        $this->assertEquals("42", $result);
    }

    /**
     * @test
     */
    public function testDivide()
    {
        $result = $this->calculator->calculate(15.0, 3.0, "divide");
        $this->assertEquals("5", $result);
    }

    /**
     * @test
     */
    public function testDivideByZero()
    {
        $result = $this->calculator->calculate(10.0, 0.0, "divide");
        $this->assertEquals("エラー: 0で割ることはできません", $result);
    }

    /**
     * @test
     */
    public function testInvalidOperation()
    {
        $result = $this->calculator->calculate(5.0, 3.0, "invalid");
        $this->assertEquals("無効な操作です", $result);
    }

    /**
     * @test
     */
    public function testDecimalNumbers()
    {
        $result = $this->calculator->calculate(3.5, 2.5, "add");
        $this->assertEquals("6", $result);
    }

    /**
     * @test
     */
    public function testNegativeNumbers()
    {
        $result = $this->calculator->calculate(-5.0, 3.0, "add");
        $this->assertEquals("-2", $result);
    }

    /**
     * @test
     */
    public function testZeroDivisionWithNegativeNumber()
    {
        $result = $this->calculator->calculate(-10.0, 0.0, "divide");
        $this->assertEquals("エラー: 0で割ることはできません", $result);
    }
} 