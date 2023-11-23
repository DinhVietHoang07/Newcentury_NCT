<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('house_name');
            $table->string('address');
            $table->integer('number_of_bedrooms');
            $table->integer('number_of_bathrooms');
            $table->decimal('area');
            $table->decimal('rent_price');
            $table->decimal('sale_price')->nullable();
            $table->enum('status', ['for_rent','not_available']);
            $table->timestamps();        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
};
