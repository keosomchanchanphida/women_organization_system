<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content_path');
            $table->string('type');
            $table->unsignedBigInteger('major_id');
            $table->timestamps();
        });
        Schema::create('activity_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->string('image_description_path');
            $table->unsignedBigInteger('activity_id');
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
        Schema::dropIfExists('activity_images');
        Schema::dropIfExists('activities');
    }
}
