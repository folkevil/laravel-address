<?php

namespace Werxe\LaravelAddress\Entities;

use Werxe\LaravelAddress\Entities\Country;
use Werxe\LaravelAddress\Contracts\Province as Contract;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Province extends Eloquent implements Contract
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'country_provinces';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [ 'name', 'iso_name' ];

    /**
     * {@inheritdoc}
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
