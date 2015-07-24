<?php

namespace Werxe\LaravelAddress\Tests;

use Werxe\LaravelAddress\Entities\Country;
use Illuminate\Support\Facades\Schema;

class FunctionalTestCase extends \Orchestra\Testbench\TestCase
{
    protected function createCountry(array $attributes)
    {
        return Country::create($attributes);
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->artisan('migrate', [
            '--database' => 'testbench',
            '--realpath' => realpath(__DIR__.'/../src/migrations'),
        ]);

        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('email');
        });
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
