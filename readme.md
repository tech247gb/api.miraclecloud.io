# Miracle cloud app

This project was generated with Lumen PHP Framework
{project_dir}/public -- directory with index.php 

## Install dependencies

    php: 7.2
    ext-pdo: *
    ext-json: *
    ext-mbstring: *
    ext-openssl: *
    lib-pcre: *
    ext-dom: *
    ext-phar: *
    ext-tokenizer: *
    ext-libxml: *
    ext-xml: *
    ext-xmlwriter: *
    ext-zlib: *
    

## Getting started

1. git clone git@bitbucket.org:bekey_/dashboardapi.git'
2. copy file .env.{environment} to .env | where {environment} = dev/prod
3. php composer install
4. php artisan apidoc:generate | where {environment} = develop



## Server side

1. add headers 
    * 'Access-Control-Allow-Methods' 'GET, POST, OPTIONS, DELETE, PUT'
    * 'Access-Control-Allow-Headers' 'Content-Type, PrefferedUrl, Authorization, Access-Control-Allow-Headers'
    * 'Content-Type' 'application/json'
    * if env:
        * dev -- 'Access-Control-Allow-Origin' 'http://localhost:4200,{url_to_front}'
        * prod -- 'Access-Control-Allow-Origin' '{url_to_front}'
