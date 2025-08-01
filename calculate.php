<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'src/Calculator.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operation'])) {
        $num1 = (float)$_POST['num1'];
        $num2 = (float)$_POST['num2'];
        $operation = $_POST['operation'];

        $calculator = new Calculator();
        $result = $calculator->calculate($num1, $num2, $operation);

        echo "<h1>計算結果</h1>";
        echo "<h2>結果: $result</h2>";
        echo "<a href='index.php'>戻る</a>";
    } else {
        echo "<h1>エラー: 必要なデータが不足しています</h1>";
        echo "<a href='index.php'>戻る</a>";
    }
} else {
    echo "<h1>無効なリクエストです</h1>";
    echo "<a href='index.php'>戻る</a>";
}
