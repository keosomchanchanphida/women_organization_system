<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->date('date_of_birth');
            $table->date('date_joined_women_union');
            $table->date('date_joined_youth_union');
            $table->date('date_joined_trade_union')->nullable();
            $table->date('date_joined_political_party')->nullable();
            $table->integer('place_of_birth');
            $table->integer('living_place');
            $table->integer('tribe_id');
            $table->integer('religious_id');
            $table->integer('marjor_id');
            $table->integer('education_id')->nullable();
            $table->integer('career_id');
            $table->integer('state_position_id')->nullable();
            $table->integer('political_position_id')->nullable();
            $table->integer('graduated_place_id');
            $table->integer('status_id');
            $table->integer('phone_number');
            $table->integer('duty_id');
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
        Schema::dropIfExists('members');
    }
}
