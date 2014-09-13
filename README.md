# Assets Module
###### This is new repository from the old [walisph/walis-assets](https://github.com/walisph/walis-assets)
[![Build Status](https://travis-ci.org/walisph/assets.svg)](https://travis-ci.org/walisph/assets)
[![Latest Stable Version](https://poser.pugx.org/walisph/assets/v/stable.svg)](https://packagist.org/packages/walisph/assets)
[![Total Downloads](https://poser.pugx.org/walisph/assets/downloads.svg)](https://packagist.org/packages/walisph/assets)
[![Latest Unstable Version](https://poser.pugx.org/walisph/assets/v/unstable.svg)](https://packagist.org/packages/walisph/assets)
[![License](https://poser.pugx.org/walisph/assets/license.svg)](https://packagist.org/packages/walisph/assets)

This package focus on assets commands but later on can be more extensive. This is built for WalispPH 2 Laravel Applications, yet.

## Installation
Install or update the package through your `composer.json`
```
{
    "require-dev": {
        "walisph/assets": "0.1.*"
    }
}
```
And then run the composer install or update with `--dev` option
```
composer install --dev
```

Once this operation is completed, the final step is to add the Service Provider. Add to your Configuration App `app/config/app.php` the new item to the providers array.
```
'providers' => array(
    .....
    'Walisph\Assets\AssetsServiceProvider',
)
```

## Usage
There are many ways to do for your Walis assets directory
 - [Clean](#assetsclean)
 - [Import](#assetsimport)

#### assets:clean
This function is to clean your assets directory, either `storage`, and even `public`
```
php artisan assets:clean
```
To specify a directory just add `-d` to your option
```
php artisan assets:clean -d storage
```
Or if you want a direct option
```
php artisan assets:clean --storage
```
this clean the assets storage path

#### assets:import
This function is to import an assets library from your base vendor directory.
```
php artisan assets:import {owner}/{product}
```

For example, the company Zurb and their product the Foundation. Between the company and product the separator is a slash `/`
```
php artisan assets:import zurb/foundation
```
Since v0.1.1, you can now import an assets library downloaded by your bower, for example:
```
php artisan assets:import animate.css

php artisan assets:import jquery
```


## License
The MIT License (MIT)

Copyright (c) 2014 Walis Philippines <info@walis.com.ph>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

* * *


###### CREATED AND DEVELOPED BY WALIS PHILIPPINES - 2014