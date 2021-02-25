# Pesapal - Laravel Quick Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/epmnzava/pesapal.svg?style=flat-square)](https://packagist.org/packages/epmnzava/pesapal)
[![Build Status](https://img.shields.io/travis/epmnzava/pesapal/master.svg?style=flat-square)](https://travis-ci.org/epmnzava/pesapal)
[![Total Downloads](https://img.shields.io/packagist/dt/epmnzava/pesapal.svg?style=flat-square)](https://packagist.org/packages/epmnzava/pesapal)
[![Emmanuel Mnzava](https://img.shields.io/badge/Author-Emmanuel%20Mnzava-green)](mailto:epmnzava@gmail.com)


This is a laravel package for intergrating with - [pesapal service] (https://developer.pesapal.com/)
## Installation
- Laravel Version: ˆ7.*
- PHP Version: ˆ7.2

You can install the package via composer:

```bash
composer require epmnzava/pesapal
```

# Update your config (for Laravel 5.4 and below)
Add the service provider to the providers array in config/app.php:
```
Epmnzava\Pesapal\PesapalServiceProvider::class
```
Add the facade to the aliases array in config/app.php:
```
'Pesapal'=>Epmnzava\Pesapal\PesapalFacade::class,
```

# Publish the package configuration (for Laravel 5.4 and below)
Publish the configuration file and migrations by running the provided console command:
```
php artisan vendor:publish --provider="Epmnzava\Pesapal\PesapalServiceProvider"
```
### Environmental Variables
PESAPAL_CONSUMER_KEY ` your provided pesapal consumer key  `<br/>

PESAPAL_CONSUMER_SECRET ` your provided pesapal client secret `<br/>

PESAPAL_API_URL ` your provided pesapal api url live: www.pesapal.com Test demo.pesapal.com  `<br/>


PESAPAL_CALLBACK_URL    ` your  callback url `<br/>

CURRENCY_CODE ` currency put TZS for Tanzanian Shillings `<br/>


## Usage
This release does not come with database tables for transaction or payments you need to create then  After you have filled all necessary variables , providers and facases this is how the package can be used.

``` php
<?php

namespace App\Http\Controllers;

use Pesapal;

use Illuminate\Http\Request;
class TransactionController extends Controller
{
//

    public function customer_transaction(){

        
        //Pesapal::make_payment("customerfirstname","customerlastname","customerlastname","amount","transaction_id");
      $res=Pesapal::makepayment("emmnauel","30000","mnzava","epmnzava@gmail.com","MERCHANT","453f4f4343" ,"transacto","0679079774");


       
    echo  $res;

    }```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email epmnzava@gmail.com instead of using the issue tracker.

## Credits
- [Emmanuel Mnzava](https://github.com/dbrax)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

