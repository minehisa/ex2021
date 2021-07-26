# docker 開発環境
簡易メモ

## 開発環境構築
Laravel + PostgreSQL + pgAdmion4 + Apatch
- Laravel Framework 7.34
- PostgreSQL(接続先:.envファイル参照)
- pgadmin4 (接続：localhost:8081.id,password:./docker-compose参照)

[初期設定]
- web: localhost:8081
- pgadmin4: localhost:8000

### 参考サイト
- https://qiita.com/sakeafterbeer/items/56cea7e981dacdfc686f 

### コンテナ生成・起動 
 docker-compose.yml のディレクトリで
```
docker-compose up -d
```

### コンテナ内に入るとき 
```
docker-compose exec コンテナ名 bash
```

### コンテナ停止 
```
docker-compose down
```

### Dockerfile や ビルドディレクトリの内容を変更したい場合
```
docker-compose build --no-cache
```
docker-composeの変更，再構築の必要がない場合
```
docker-compose up -d
```
## Laravel

### 初期設定
以下のコマンドを実行
```
docker-compose exec web bash
composer install
npm install
npm run dev
```

エラー時
```
バージョンの問題
npm uninstall --save-dev sass-loader && npm install --save-dev sass-loader@7.1.0

jsモジュールを全部消し、npmのキャッシュをクリアした上で再度モジュールを入れ直す
rm -rf node_modules && rm package-lock.json && npm cache clear --force && npm cache clean --force && npm install
```

### データベースの作成
前提：.env ファイルを修正してデータベースにアクセスできるようにしておく

/app/database/migrations に記載
```
テーブル作成
php artisan migrate
テーブルを全て削除してマイグレーションを実行しなおす場合
php artisan migrate:fresh

```

### ダミーデータの作成
\App\database\faker に記載
実行コマンド
```
php artisan db:seed
```

### ページ遷移
1. ルーティング追記  
    /routes/web.php に追加  
2. Controller作成，メソッドの追加  
    /app/Http/Controller に作成  
    ```
    docker-compose exec web bash
    php artisan make:controller --resource nameController
    ```
    
3. name,blade.phpの作成  
