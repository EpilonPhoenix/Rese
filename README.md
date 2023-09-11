# Rese

概要　来店予約アプリの alpha テスト版 ver 0.1.0

## 作成した目的

来店予約、来店、決済、レビューを円滑に行うため

## アプリケーション　 URL

https://rese.kaiacc.net  
ログイン画面

## 機能一覧

ログイン機能  
新規登録機能  
メールアドレス認証機能  
来店予約機能  
お気に入り登録機能  
決済機能（テスト版）  
店舗管理機能  
アプリ管理者機能  
QR コードによる来店確認機能  
お知らせメール機能  
予約確認メール機能  
(画像の管理に Laravel Storage)

＋口コミ機能（コメント投稿、評価機能）  
＋店舗一覧ソート機能  
＋ CSV ファイルインポート機能

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
php artisan migrate:fresh --seed  
php artisan storage:link

exit

### 本番環境

Azure VM  
Azure SQL Database
（メール関連機能はインフラの整備未了のため、エラー発生します）

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

### CSV ファイルの仕様

ファイルの文字コード:UTF-8  
カラム名：area_id,genre_id,name,about  
area_id の値：東京都:1,大阪府:2,福岡県:3  
genre_id の値:寿司：1,焼肉:2,居酒屋:3,イタリアン:4,ラーメン:5  
参考ファイル  
Req/import.csv ファイル
