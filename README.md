# FashionablyLate お問い合わせフォーム

## 環境構築
**Docker**
1. `git clone git@github.com:atyamaru1211/test-1.git`
2. `docker-compose up -d --build`

**Laravel環境構築**
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更  
`DB_CONNECTION=mysql`  
`DB_HOST=mysql`  
`DB_PORT=3306`  
`DB_DATABASE=laravel_db`  
`DB_USERNAME=laravel_user`  
`DB_PASSWORD=laravel_pass`  
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed


## 使用技術(実行環境)
  - PHP 7.4.9
  - Laravel 8.83.27
  - MySQL 8.0.26

## ER図
![Image](https://github.com/user-attachments/assets/de90025a-54f5-4ff3-8cca-62f518482bf3)

## URL
  - 開発環境：http://localhost/
  - phpMyAdmin:http://localhost:8080/
