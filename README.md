# AssetVer
A Laravel package that allows you easily to manage a version value for assets URL.  
This package is maintained under Laravel 5.8.

# Installation  

    composer require sukohi/asset-ver:1.*

# Usage

## Update version value

The following command automatically updates asset version.


    php artisan asset_ver
    
## Clear 

    php artisan asset_ver:clear    

## Helper function

You can get a current version value through asset_ver() as follows.

**(in Blase)**  

    https://example.com/js/test.js?{{ asset_ver() }}

**(in PHP)**  

    $version = asset_ver(); // ver=***
    
    // or only version value
    
    $version = asset_ver(false);
    
# Configuration

If you'd like to set configurations, publish `config/asset_ver.php` through `php artisan vendor:publish`.

# License

This package is licensed under the MIT License.

Copyright 2019 Sukohi Kuhoh