<?php

namespace Werxe\LaravelAddress\Tests\Entities;

use Werxe\LaravelAddress\Entities\Country;
use Werxe\LaravelAddress\Entities\Province;
use Werxe\LaravelAddress\Tests\FunctionalTestCase;

class ProvinceTest extends CountryTest
{
    /** @test */
    public function it_can_create_a_new_province()
    {
        $this->it_can_create_a_new_country();

        $country = Country::find(1);

        $province = $country->provinces()->create([
            'iso_name' => 'US-WA',
            'name'     => 'Washington',
        ]);

        $this->assertSame('US-WA', $province->iso_name);
        $this->assertSame('Washington', $province->name);
        $this->assertSame('United States', $province->country->name);
    }
}
