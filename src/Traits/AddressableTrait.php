<?php

namespace Werxe\LaravelAddress\Traits;

use Werxe\LaravelAddress\Contracts\Address;

trait AddressableTrait
{
    /**
     * Returns the addresses that this entity has attached.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    abstract public function addresses();

    /**
     * Determines if the entity has any addresses attached.
     *
     * @return bool
     */
    public function hasAddresses()
    {
        return (bool) $this->address->count();
    }

    /**
     * Creates a new address.
     *
     * @param  array  $attributes
     * @return \Werxe\LaravelAddress\Contracts\Address
     */
    public function createAddress(array $attributes)
    {
        return $this->addresses()->create($attributes);
    }

    /**
     * Updates the given address.
     *
     * @param  \Werxe\LaravelAddress\Contracts\Address  $address
     * @param  array  $attributes
     * @return \Werxe\LaravelAddress\Contracts\Address
     */
    public function updateAddress(Address $address, array $attributes)
    {
        $address->fill($attributes)->save();

        return $address;
    }

    /**
     * Deletes the given address.
     *
     * @param  \Werxe\LaravelAddress\Contracts\Address  $address
     * @return bool
     */
    public function deleteAddress(Address $address)
    {
        return $address->delete();
    }

    /**
     * Deletes all the addresses attached to the entity.
     *
     * @return bool
     */
    public function deleteAllAddresses()
    {
        return $this->addresses()->delete();
    }
}
