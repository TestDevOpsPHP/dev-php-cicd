# ベースイメージとして公式のPHPイメージを使用
FROM php:8.3.6-fpm

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
	git \
	curl \
	zip \
	unzip \
    && docker-php-ext-install pdo_mysql

# Composerをインストール
COPY --from=composer:2.7.6 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www/html

# プロジェクトのファイルをコンテナにコピー
COPY . .