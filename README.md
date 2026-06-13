# セットアップ手順

## 環境
- PHP 8.0 (Docker)
- Laravel 7

## 起動
docker-compose up -d

## 初回のみ
composer install
php artisan key:generate

## DB
.env を設定

