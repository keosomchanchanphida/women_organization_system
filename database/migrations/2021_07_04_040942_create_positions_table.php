<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_positions', function (Blueprint $table) {
            $table->id();
            $table->string('position');
        });
        Schema::create('political_positions', function (Blueprint $table) {
            $table->id();
            $table->string('position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state_positions');
        Schema::dropIfExists('political_positions');
    }
}
