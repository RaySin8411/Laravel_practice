#安裝步驟

* Step 1

    安裝 Composer https://getcomposer.org/ 

* Step 2
    
    composer create-project --prefer-dist laravel/laravel youbike "6.0.*"

* Step 3

    開啟開發環境網頁伺服器

        cd youbike
        php artisan serve

* Step 4
    加入會員認證、註冊帳號(站在巨人的肩膀上)

        ##  安裝套件
        composer require laravel/ui ^1.0
        php artisan ui vue --auth
        npm install && npm run dev
        php artisan route:list

    加入ubike model(自己撰寫方法邏輯)

        php artisan make:model Ubike -rmc
        
        ## app/Ubike.php(Model)
        # m migration
        ## database/migrations/date_create_ubikes_table.php
        # c controller and r 載入預測CRUD方法
        ## app/Http/Controller/UbikeController.php
        
* Step 5
    自動產生API文件
    
        ## 安裝套件
        composer require --dev mpociot/laravel-apidoc-generator
        ## 配置檔案
        php artisan vendor:publish --provider="Mpociot\ApiDoc\ApiDocGeneratorServiceProvider" --tag=apidoc-config
        ## 產生API 文件
        php artisan apidoc:generate
