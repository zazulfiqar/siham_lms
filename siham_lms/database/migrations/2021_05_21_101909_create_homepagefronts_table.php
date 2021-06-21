<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepagefrontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepagefronts', function (Blueprint $table) {
            $table->id();
            $table->string('banner_text')->nullable();
            $table->string('start_learning')->nullable();
            $table->string('subjects_topic')->nullable();
            $table->string('subjects_text')->nullable();
            $table->string('learn_anywhere_topic')->nullable();
            $table->string('learn_anywhere_text')->nullable();

            $table->string('learn_anywhere_card_topic1')->nullable();
            $table->string('learn_anywhere_card_text1')->nullable();

            $table->string('learn_anywhere_card_topic2')->nullable();
            $table->string('learn_anywhere_card_text2')->nullable();

            $table->string('learn_anywhere_card_topic3')->nullable();
            $table->string('learn_anywhere_card_text3')->nullable();

            $table->string('pricing_content')->nullable();

            $table->string('testimonial_topic')->nullable();


            $table->string('faq_topic')->nullable();
            $table->string('faq_content')->nullable();

            $table->string('contact_topic')->nullable();
            $table->string('contact_content')->nullable();
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
        Schema::dropIfExists('homepagefronts');
    }
}
