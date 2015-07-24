<?php

namespace Werxe\LaravelAddress\Tests\Entities;

use Werxe\LaravelAddress\Entities\Country;
use Werxe\LaravelAddress\Entities\Address;
use Werxe\LaravelAddress\Tests\FunctionalTestCase;

use Werxe\LaravelAddress\Tests\Stubs\User;

class AddressTest extends FunctionalTestCase
{
    /** @test */
    public function test()
    {
        $address = Address::all();

        $this->assertEmpty($address);
    }

    /** @test */
    public function it_can_create_a_new_country()
    {
        $country = Country::create([ 'iso_name' => 'US', 'name' => 'United States' ]);

        $this->assertSame('United States', $country->name);
    }

    /** @test */
    public function it_can_create_a_new_address()
    {
        $this->it_can_create_a_new_country();

        $country = Country::find(1);

        $user = User::create([ 'email' => 'john@doe.com' ]);

        $address = $user->createAddress([
            'name'        => 'John Doe',
            'country_id'  => $country->id,
            'street'      => '1600 Pennsylvania Avenue NW',
            'locality'    => 'Washington',
            'region'      => 'DC',
            'postal_code' => '20500',
        ]);

        $this->assertSame('United States', $address->country->name);

        $this->assertSame('john@doe.com', $address->entity->email);
    }
}
