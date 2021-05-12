#安裝步驟

## Step 1
安裝 Composer https://getcomposer.org/ 

## Step 2
    
    composer create-project --prefer-dist laravel/laravel youbike "6.0.*"

## Step 3
開啟開發環境網頁伺服器

    cd youbike
    php artisan serve

## Step 4
加入會員認證、註冊帳號

    ## 安裝套件
    composer require laravel/ui ^1.0
    php artisan ui vue --auth
    npm install && npm run dev
    php artisan route:list

## Step 5
自動產生API文件
    
    ## 安裝套件
    composer require --dev mpociot/laravel-apidoc-generator
    ## 配置檔案
    php artisan vendor:publish --provider="Mpociot\ApiDoc\ApiDocGeneratorServiceProvider" --tag=apidoc-config