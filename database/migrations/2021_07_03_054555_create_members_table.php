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
            $table->date('date_joined_youth');
            $table->date('date_joined_kammaban');
            $table->date('date_joined_member');
            $table->date('date_joined_organization');
            $table->integer('place_of_birth');
            $table->integer('live_in');
            $table->integer('tribe_id');
            $table->integer('religious_id');
            $table->integer('marjor_id');
            $table->string('education_level')->nullable();
            $table->integer('career_id');
            $table->integer('career_rank_id')->nullable();
            $table->integer('graduated_at_id')->nullable();
            $table->integer('status_id');
            $table->integer('phone_number');
            $table->integer('member_rank');
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
