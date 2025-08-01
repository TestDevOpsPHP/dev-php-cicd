<?php

class Calculator
{
    public function calculate(float $num1, float $num2, string $operation): string
    {
        switch ($operation) {
            case "add":
                return (string)($num1 + $num2);
            case "subtract":
                return (string)($num1 - $num2);
            case "multiply":
                return (string)($num1 * $num2);
            case "divide":
                if ($num2 != 0) {
                    return (string)($num1 / $num2);
                } else {
                    return "エラー: 0で割ることはできません";
                }
            default:
                return "無効な操作です";
        }
    }
}
