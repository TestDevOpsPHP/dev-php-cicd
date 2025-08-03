<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'class/calculator.php';
require_once 'class/calculationDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operation'])) {
            $num1 = (float)$_POST['num1'];
            $num2 = (float)$_POST['num2'];
            $operation = $_POST['operation'];

            $calculator = new Calculator();
            $result = $calculator->calculate($num1, $num2, $operation);
            $calculationDB = new CalculationDB();
            $db = $calculationDB->connectDB();
            $calculationDB->insert($result, $db);

            echo "<h1>計算結果</h1>";
            echo "<h2>結果: $result</h2>";
            echo "<a href='index.php'>戻る</a>";
            } else {
            echo "<h1>無効なリクエストです</h1>";
            echo "<a href='index.php'>戻る</a>";
        }
    } catch (PDOException $e) {
        // エラー時は日本語で表示
        echo "<h3>エラー: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</h3>";
        echo "<a href='index.php'>戻る</a>";
    }
}
