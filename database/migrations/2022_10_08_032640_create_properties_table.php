<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('county');
            $table->string('country');
            $table->string('town');
            $table->string('postcode')->nullable();
            $table->longText('description');
            $table->string('full_url')->nullable();
            $table->string('address');
            $table->string('image_full');
            $table->string('image_thumbnail');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('num_bedrooms');
            $table->integer('num_bathrooms');
            $table->string('price');
            $table->enum('type', ['sale', 'rent'])->default('rent');
            $table->longText('property_type');
            $table->enum('from', ['web', 'api'])->default('web');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
