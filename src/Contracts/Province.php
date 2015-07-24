<?php

namespace Werxe\LaravelAddress\Contracts;

interface Province
{
    /**
     * Returns the country that this province belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country();
}
