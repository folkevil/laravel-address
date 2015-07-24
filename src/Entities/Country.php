<?php

namespace Werxe\LaravelAddress\Entities;

use Illuminate\Database\Eloquent\Model;
use Werxe\LaravelAddress\Contracts\Country as Contract;

class Country extends Model implements Contract
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'countries';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [ 'name', 'iso_name' ];

    /**
     * {@inheritdoc}
     */
    public function provinces()
    {
        return $this->hasMany(Province::class, 'country_id');
    }

    /**
     * Determines if the country has any provinces.
     *
     * @return bool
     */
    public function hasProvinces()
    {
        return (bool) $this->provinces->count();
    }
}
