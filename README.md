# walis-assets
This package focus on assets commands but later on can be more extensive. This is built for Walis Applications, yet.

## Installation
Install the package through your `composer.json`
```
{
    "require": {
        "walisph/walis-assets": "dev-master"
    }
}
```
Once this operation is completed, the final step is to add the Service Provider. Add to your Configuration App `app/config/app.php` the new item to the providers array.
```
'providers' => array(
    .....
    'Walis\Assets\AssetServiceProvider',
)
```

## Usage
There are many ways to do for your Walis assets directory
 - [Clean](#clean)
 - [Import](#import)

## Clean
This function is to clean your assets directory, either `storage`, `vendor` and even `public`

`php artisan assets:clean`

This fun

## Import
This function is to import assets library from your base vendor directory to your asset library.

`php artisan assets:import`

* * *
###### Created and Developed by Walis Philippines