<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('province_id');
        });
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('district_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('villages');
    }
}
