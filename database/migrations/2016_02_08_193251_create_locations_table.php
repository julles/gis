<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('location_category_id')->unsigned();
            $table->string('longitude');
            $table->string('latitude');
            $table->string('title');
            $table->text('body');
            $table->string('picture');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('location_category_id')->references('id')->on('location_categories')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('locations');
    }
}
