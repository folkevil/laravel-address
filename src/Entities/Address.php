<?php

namespace Werxe\LaravelAddress\Entities;

use Werxe\LaravelAddress\Schema;
use Werxe\LaravelAddress\Entities\Country;
use Werxe\LaravelAddress\Contracts\Address as Contract;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Address extends Eloquent implements Contract
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'addresses';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name',
        'region',
        'street',
        'locality',
        'country_id',
        'postal_code',
    ];

    /**
     * {@inheritdoc}
     */
    protected $with = [ 'country' ];

    /**
     * {@inheritdoc}
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * {@inheritdoc}
     */
    public function entity()
    {
        return $this->morphTo();
    }

    /**
     * {@inheritdoc}
     */
    // public function format()
    // {
    //     return (new Schema($this))->format();
    // }
}
