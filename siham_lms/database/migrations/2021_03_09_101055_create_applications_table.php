<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('std_id');
            $table->string('course_id')->nullable();
            $table->string('subject')->nullable();
            $table->string('application')->nullable();
            $table->string('cell')->nullable();
            $table->text('photo')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->string('to_send')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('response')->nullable();

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
        Schema::dropIfExists('applications');
    }
}
