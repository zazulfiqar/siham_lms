<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_pricings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('course_duration')->nullable();
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->string('feature_One')->nullable();
            $table->string('feature_Two')->nullable();
            $table->string('feature_Three')->nullable();
            $table->string('feature_Four')->nullable();
            $table->string('feature_Five')->nullable();

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
        Schema::dropIfExists('front_pricings');
    }
}
