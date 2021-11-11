# Excel Export and Import on Laravel in practice

## Necessarily
* PHP: 7.2以上
* Laravel: 5.8以上
* PhpSpreadsheet: ^1.15
* PHP extension php_zip enabled
* PHP extension php_xml enabled
* PHP extension php_gd2 enabled
* PHP extension php_iconv enabled
* PHP extension php_simplexml enabled
* PHP extension php_xmlreader enabled
* PHP extension php_zlib enabled

## Download and Setting Configure
* Download
    ```shell
    composer require maatwebsite/excel --ignore-platform-reqs
    ```

* Setting Configure
    ```shell
    php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config
    ```
## Export
### Basic Flow
1. 建立匯出類別
```shell
php artisan make:export UsersExport --model=User
```

2. 在控制器方法中使用匯出類別

3. 建立匯出路由

## Import 
### Basic Flow
1. 建立匯入類別
```shell
php artisan make:import UsersImport --model=User
```

2. 在控制器方法中使用匯入類別

3. 建立匯入路由
