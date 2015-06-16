<?php

namespace Werxe\Address\Tests\Stubs;

use Werxe\Address\Entities\Address;
use Illuminate\Database\Eloquent\Model;
use Werxe\Address\Traits\AddressableTrait;

class User extends Model
{
    use AddressableTrait;

    protected $fillable = [ 'email' ];

    public function addresses()
    {
        return $this->morphMany(Address::class, 'entity');
    }
}
