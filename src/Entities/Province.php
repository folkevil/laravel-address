<?php

namespace Werxe\LaravelAddress\Entities;

use Illuminate\Database\Eloquent\Model;
use Werxe\LaravelAddress\Contracts\Province as Contract;

class Province extends Model implements Contract
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
