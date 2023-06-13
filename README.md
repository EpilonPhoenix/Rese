# Rese
概要　来店予約アプリのalphaテスト版
## 作成した目的
来店予約、来店、決済、レビューを円滑に行うため
## アプリケーション　URL
https://rese.kaiacc.net  
ログイン画面
## 他のリポジトリ
（存在するが、非公開）
## 機能一覧
ログイン機能  
新規登録機能  
メールアドレス認証機能  
来店予約機能  
お気に入り登録機能  
決済機能（テスト版）  
レビュー機能  
店舗管理機能  
アプリ管理者機能  
QRコードによる来店確認機能  
お知らせメール機能  
予約確認メール機能  
(画像の管理にLaravel Storage)  

## 使用技術
php 8.2  
Laravel 10  
Fortify(ユーザー認証関係)  
Laravel Cashier (Stripe)


### 開発環境
Docker  
nginx  
mysql  
# 環境構築
git clone https://github.com/EpilonPhoenix/Rese.git  
docker-compose up -d --build  
mv html/.env.example html/.env  
docker-compose exec php bash  
composer update  
php artisan key:generate  
php artisan migrate:fresh  
php artisan db:seed  
exit  
## テスト用アカウント情報
ユーザーアカウント：  
メールアドレス:user@admin  
パスワード:password  
店舗管理者アカウント：  
メールアドレス:owner@admin  
パスワード:OwnerPass  
アプリ管理者アカウント：  
メールアドレス:admin@admin  
パスワード:ReseMaster  