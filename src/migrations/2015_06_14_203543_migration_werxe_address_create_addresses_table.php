<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationWerxeAddressCreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();

            $table->morphs('entity');
            $table->integer('country_id');
            $table->string('name');
            $table->string('street');
            $table->string('locality');
            $table->string('region');
            $table->string('post_office_box_number')->nullable();
            $table->string('postal_code');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
