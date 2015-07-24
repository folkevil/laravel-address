<?php

namespace Werxe\LaravelAddress\Tests\Entities;

use Werxe\LaravelAddress\Entities\Country;
use Werxe\LaravelAddress\Tests\FunctionalTestCase;

class CountryTest extends FunctionalTestCase
{
    /** @test */
    public function it_can_create_a_new_country()
    {
        $country = Country::create([ 'iso_name' => 'US', 'name' => 'United States' ]);

        $this->assertSame('US', $country->iso_name);
        $this->assertSame('United States', $country->name);
    }

    /** @test */
    public function it_can_update_an_existing_country()
    {
        $this->it_can_create_a_new_country();

        $country = Country::find(1);

        $country->update([ 'name' => 'United States of America' ]);

        $this->assertSame('US', $country->iso_name);
        $this->assertSame('United States of America', $country->name);
    }
}
