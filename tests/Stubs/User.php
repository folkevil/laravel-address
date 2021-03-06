<?php

namespace Werxe\LaravelAddress\Tests\Stubs;

use Illuminate\Database\Eloquent\Model;
use Werxe\LaravelAddress\Entities\Address;
use Werxe\LaravelAddress\Traits\AddressableTrait;

class User extends Model
{
    use AddressableTrait;

    protected $fillable = [ 'email' ];

    public function addresses()
    {
        return $this->morphMany(Address::class, 'entity');
    }
}
