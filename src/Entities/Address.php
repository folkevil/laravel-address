<?php

namespace Werxe\LaravelAddress\Entities;

use Illuminate\Database\Eloquent\Model;
use Werxe\LaravelAddress\Contracts\Address as Contract;

class Address extends Model implements Contract
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
}
