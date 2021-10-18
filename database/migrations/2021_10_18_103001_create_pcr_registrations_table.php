<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcrRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcr_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_type (nor, pre)');
            $table->string('last_tested_date');
            $table->string('last_tested_result');
            $table->string('day_starting_time');
            $table->string('report');
            $table->unsignedBigInteger('usre_id')->nullable();
            $table->unsignedBigInteger('center_id')->nullable();
            $table->enum('status', [0,1]);
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
        Schema::dropIfExists('pcr_registrations');
    }
}
