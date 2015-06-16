<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationWerxeAddressCreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('iso_name');
            $table->string('name');

            $table->engine = 'InnoDB';
        });

        // Schema::create('country_translation', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->integer('country_id');
        //     $table->string('locale', 11);
        //     $table->string('name');

        //     $table->engine = 'InnoDB';

        //     $table->foreign('country_id')->references('id')->on('countries')
        //         ->onUpdate('restrict')
        //         ->onDelete('cascade')
        //     ;
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
