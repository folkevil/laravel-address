<?php

namespace Werxe\Address\Entities;

use Werxe\Address\Entities\Province;
use Werxe\Address\Contracts\Country as Contract;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Country extends Eloquent implements Contract
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
}
