# 學習PHP Laravel紀錄

## Language, Package Management, and IDE
* Language: [php](https://www.php.net/)
* Package Management: [composer](https://getcomposer.org/)
* IDE: [PhpStorm](https://www.jetbrains.com/phpstorm/)
    * [IDE Eval Reset插件](https://blog.csdn.net/alan_alei/article/details/111738323)

## Laravel
* Step 1
```shell
composer create-project --prefer-dist laravel/laravel projectname "6.0.*"
```

* Step 2 開啟開發環境網頁伺服器
```shell
cd projectname
php artisan serve
```

* Step 3 Ubike API
```shell
php artisan make:model Ubike -c
## app/Http/Controller/UbikeController.php
```

* Step 4 User API
待補
  
* Step 5 自動產生API文件
```shell
 ## 安裝套件
composer require --dev mpociot/laravel-apidoc-generator
## 配置檔案
php artisan vendor:publish --provider="Mpociot\ApiDoc\ApiDocGeneratorServiceProvider" --tag=apidoc-config
## 產生API 文件
php artisan apidoc:generate
```

## API
* User
  
    * Register
        * restful method: post
    
    * Login
        * restful method: post
    
    * Logout
        * restful method: get
    
    * Userinfo
        * restful method: get
    
    * Update
        * restful method: put
    
    * Delete
        * restful method: delete

* Ubike

    * All
        * restful method: get
    
    * Alone
        * restful method: get


## Reference
* [Laravel 6.0 初體驗！怎麼用最新的 laravel 架網站！](https://ithelp.ithome.com.tw/users/20120550/ironman/2575)
* [Laravel 建立 RESTful API](https://hackmd.io/@8irD0FCGSQqckvMnLpAmzw/Hk8QeMNLz?type=view)
* [使用 Laravel 打造 RESTful API](https://ithelp.ithome.com.tw/users/20105865/ironman/2466)
