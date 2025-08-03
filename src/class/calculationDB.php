<?php
// 自動で読み込み
require __DIR__ . '/../../vendor/autoload.php';   

class CalculationDB {
    private $dotenv;

    public function __construct() {
        $this->dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $this->dotenv->load();
    }

    public function connectDB() {
        $host = $_ENV['MYSQL_HOST'];
        $dbname = $_ENV['MYSQL_DATABASE'];
        $username = $_ENV['MYSQL_USER'];
        $password = $_ENV['MYSQL_PASSWORD'];
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        return $db;
    }

    public function insert($result,$db) {
        $formattedResult = number_format((float)$result, 2, '.', '');
        $stmt = $db->prepare("INSERT INTO calculations (result) VALUES (:result)");
        $stmt->bindParam(':result', $formattedResult);
        $stmt->execute();
    }
}