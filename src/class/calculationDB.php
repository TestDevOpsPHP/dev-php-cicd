<?php
// 自動で読み込み
require __DIR__ . '/../../vendor/autoload.php';   

class CalculationDB {
    private  $dotenv;

    public function __construct() {
        $this->dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $this->dotenv->load();
    }

    public function connectDB(): PDO {
        $host = $_ENV['MYSQL_HOST'] ?? 'mysql';
        $dbname = $_ENV['MYSQL_DATABASE'] ?? 'calculation_db';
        $username = $_ENV['MYSQL_USER'] ?? 'root';
        $password = $_ENV['MYSQL_PASSWORD'] ?? '';
        
        // 型安全性を確保
        if (!is_string($host) || !is_string($dbname) || !is_string($username) || !is_string($password)) {
            throw new InvalidArgumentException('環境変数が正しく設定されていません');
        }
        
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        return $db;
    }

    public function insert(float $result, PDO $db): void {
        $formattedResult = number_format($result, 2, '.', '');
        $stmt = $db->prepare("INSERT INTO calculations (result) VALUES (:result)");
        $stmt->bindParam(':result', $formattedResult);
        $stmt->execute();
    }
}