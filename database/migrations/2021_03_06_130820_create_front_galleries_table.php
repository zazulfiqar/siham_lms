<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_galleries', function (Blueprint $table) {
            $table->id();
            $table->text('home_header_image')->nullable();
            $table->text('course_header_image')->nullable();
            $table->text('price_header_image')->nullable();
            $table->text('testimonial_header_image')->nullable();
            $table->text('blog_header_image')->nullable();
            $table->text('faq_header_image')->nullable();
            $table->text('contact_header_image')->nullable();
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
        Schema::dropIfExists('front_galleries');
    }
}
