<?php

namespace Werxe\Address\Contracts;

interface Country
{
    /**
     * Returns the provinces that belongs to this country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function provinces();
}
