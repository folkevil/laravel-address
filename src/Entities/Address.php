<?php

namespace Werxe\Address\Entities;

use Werxe\Address\Schema;
use Werxe\Address\Entities\Country;
use Werxe\Address\Contracts\Address as Contract;
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
