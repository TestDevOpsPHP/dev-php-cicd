# 計算アプリケーション

シンプルな四則演算を行うWebアプリケーションです。計算結果はデータベースに保存され、静的解析とユニットテストによる品質管理が実装されています。

## 🚀 機能

- **四則演算**: 加算、減算、乗算、除算
- **データベース保存**: 計算結果をMySQLに保存
- **環境変数管理**: `.env`ファイルによる設定管理
- **静的解析**: PHPStanによるコード品質チェック
- **ユニットテスト**: PHPUnitによるテスト自動化
- **CI/CD**: GitHub Actionsによる自動テスト実行

## 📋 必要条件

- PHP 8.3以上
- MySQL 8.0以上
- Composer
- Docker（推奨）

## 🛠️ インストール

### 1. リポジトリのクローン
```bash
git clone <repository-url>
cd calculete-develop
```

### 2. 依存関係のインストール
```bash
composer install
```

### 3. 環境変数の設定
```bash
# .envファイルを作成
cp .env.example .env

# 環境変数を編集
MYSQL_HOST=mysql
MYSQL_ROOT_PASSWORD=rootのパスワード
MYSQL_DATABASE=php-docker-db
MYSQL_USER=admin
MYSQL_PASSWORD=adminのパスワード
```

### 4. データベースのセットアップ
```sql
CREATE DATABASE calculation_db;
USE calculation_db;

CREATE TABLE calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    result DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## 🐳 Dockerを使用した実行

### 1. Docker Composeで起動
```bash
docker-compose up -d
```

### 2. アプリケーションにアクセス
```
http://localhost:8080
```

## 🧪 テスト実行

### ユニットテスト
```bash
# 全テストを実行
./vendor/bin/phpunit

# 特定のテストファイルを実行
./vendor/bin/phpunit tests/CalculatorTest.php

# カバレッジ付きで実行
./vendor/bin/phpunit --coverage-html coverage
```

### 静的解析
```bash
# PHPStanによる静的解析
composer phpstan
```

## 📁 プロジェクト構造

```
calculete-develop/
├── .github/
│   └── workflows/
│       ├── phpstan.yaml    # PHPStan CI/CD
│       └── phpunit.yaml    # PHPUnit CI/CD
├── src/
│   ├── class/
│   │   ├── calculator.php      # 計算ロジック
│   │   └── calculationDB.php   # データベース操作
│   ├── calculate.php           # 計算処理
│   └── index.php              # メインページ
├── tests/
│   └── CalculatorTest.php     # ユニットテスト
├── vendor/                    # Composer依存関係
├── .env                       # 環境変数
├── composer.json              # 依存関係定義
├── phpstan.neon              # PHPStan設定
├── phpunit.xml               # PHPUnit設定
└── README.md                 # このファイル
```

## 🚀 CI/CD

### GitHub Actions

#### PHPStanワークフロー
- **トリガー**: `develop`ブランチへのプッシュ/プルリクエスト
- **実行**: 静的解析によるコード品質チェック
- **結果**: エラーがある場合、プルリクエストのマージをブロック

#### PHPUnitワークフロー
- **トリガー**: `develop`ブランチへのプルリクエスト
- **実行**: ユニットテストの自動実行
- **結果**: テスト失敗時、プルリクエストのマージをブロック

## 🔍 品質管理

### 静的解析
- **PHPStan**: 型安全性とコード品質のチェック
- **エラーレベル**: 10
- **対象**: `src/`ディレクトリ

### テストカバレッジ
- **PHPUnit**: ユニットテストの実行
- **カバレッジ**: HTMLレポート生成
- **対象**: `src/`ディレクトリ

## 📝 開発ガイドライン

### コード品質
- PHPStanレベル10を維持
- 型安全性を重視
- エラーハンドリングを適切に実装

### テスト
- 新機能追加時はテストケースを作成
- カバレッジを維持
- エッジケースもテスト

### コミット
- 意味のあるコミットメッセージ
- 小さな変更を頻繁にコミット
- プルリクエストでレビュー
