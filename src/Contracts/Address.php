<?php

namespace Werxe\LaravelAddress\Contracts;

interface Address
{
    /**
     * Returns the country that this address belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country();

    /**
     * Returns the entity that address belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function entity();

    /**
     * Returns the address in a valid HTML schema format.
     *
     * @return string
     */
    // public function format();
}
