## Address 

Address management is a common task for applications that handles customer information like ecommerce applications where a customer can have many billing and shipping addresses.

This package provides all the required functionality and models to handle addresses in your application.

This package comes with a Country and a Province model which are related to each other.

A country can have many provinces and an address will belong to a country and to a province.

## Installation

Open your terminal and navigate to your application root folder and then run `composer require werxe/address "~1.0"`

Once that's complete, add the Address service provider inside your `config/app.php` file:

`'Werxe\Address\AddressServiceProvider',`

Run `php vendor:publish` to publish the Address migration files and then run `php artisan migrate`.

You're all set!

## Setup your model

You'll need to insert the `Werxe\Address\Traits\AddressableTrait` trait and register a method, like so:

```php
namespace App\Models;

use Werxe\Address\Entities\Address;
use Werxe\Address\Traits\AddressableTrait;

class User extends Eloquent
{
    use AddressableTrait;

    /**
     * {@inheritdoc}
     */
    protected $table = 'users';

    /**
     * {@inheritdoc}
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'entity');
    }
}
```

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send an e-mail to Bruno Gaspar at bruno@werxe.com. All security vulnerabilities will be promptly addressed.

### License

This software is released under the [BSD 3-Clause](LICENSE) License.

© 2014-2015 Werxe, All rights reserved.
