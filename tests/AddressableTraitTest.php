<?php

namespace Werxe\LaravelAddress\Tests;

use Werxe\LaravelAddress\Entities\Country;
use Werxe\LaravelAddress\Tests\Stubs\User;
use Werxe\LaravelAddress\Tests\FunctionalTestCase;

class AddressableTraitTest extends FunctionalTestCase
{
    /** @test */
    public function it_can_determine_if_an_entity_has_addresses()
    {
        $user = User::create([ 'email' => 'john@doe.com' ]);

        $this->assertFalse($user->hasAddresses());
    }

    /** @test */
    public function it_can_create_a_new_address_on_an_entity()
    {
        $country = Country::create([ 'iso_name' => 'US', 'name' => 'United States' ]);

        $user = User::create([ 'email' => 'john@doe.com' ]);

        $address = $user->createAddress([
            'name'        => 'John Doe',
            'country_id'  => $country->id,
            'street'      => '1600 Pennsylvania Avenue NW',
            'locality'    => 'Washington',
            'region'      => 'DC',
            'postal_code' => '20500',
        ]);

        $this->assertTrue($user->hasAddresses());
        $this->assertSame('1', $address->entity->id);
    }

    /** @test */
    public function it_can_update_an_existing_entity_address()
    {
        $this->it_can_create_a_new_address_on_an_entity();

        $user = User::find(1);

        $address = $user->addresses->first();

        $user->updateAddress($address, [ 'postal_code' => '20400' ]);

        $this->assertSame('20400', $address->postal_code);
    }

    /** @test */
    public function it_can_delete_an_address_from_an_entity()
    {
        $this->it_can_create_a_new_address_on_an_entity();

        $user = User::find(1);

        $address = $user->addresses->first();

        $user->deleteAddress($address);

        $user = $user->fresh();

        $this->assertFalse($user->hasAddresses());
    }

    /** @test */
    public function it_can_delete_all_the_addresses_from_an_entity()
    {
        $this->it_can_create_a_new_address_on_an_entity();

        $country = Country::find(1);

        $user = User::find(1);

        $addressData = [
            'name'        => 'John Doe',
            'country_id'  => $country->id,
            'street'      => '1600 Pennsylvania Avenue NW',
            'locality'    => 'Washington',
            'region'      => 'DC',
            'postal_code' => '20500',
        ];

        $user->createAddress($addressData);
        $user->createAddress($addressData);
        $user->createAddress($addressData);

        $this->assertEquals(4, $user->addresses->count());

        $user->deleteAllAddresses();

        $user = $user->fresh();

        $this->assertEquals(0, $user->addresses->count());
        $this->assertFalse($user->hasAddresses());
    }
}
