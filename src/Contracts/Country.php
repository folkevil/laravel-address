<?php

namespace Werxe\LaravelAddress\Contracts;

interface Country
{
    /**
     * Returns the provinces that belongs to this country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function provinces();

    /**
     * Determines if the country has any provinces.
     *
     * @return bool
     */
    public function hasProvinces();
}
