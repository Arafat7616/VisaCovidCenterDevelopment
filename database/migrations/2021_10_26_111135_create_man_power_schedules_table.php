<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManPowerSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('man_power_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('regular / premium')->nullable();
            $table->string('morning_starting_time')->nullable();
            $table->string('morning_ending_time')->nullable();
            $table->string('day_starting_time')->nullable();
            $table->string('day_ending_time')->nullable();
            $table->string('trusted_medical_assistant_for_pcr')->nullable();
            $table->integer('pcr_available_set')->nullable()->default(0);
            $table->string('trusted_medical_assistant_for_vaccine')->nullable();
            $table->integer('vaccine_available_set')->nullable()->default(0);
            $table->string('trusted_medical_assistant_for_booster')->nullable();
            $table->integer('booster_available_set')->nullable()->default(0);
            $table->timestamp('date')->nullable();
            $table->string('pcr_time')->nullable();
            $table->string('vaccine_time')->nullable();
            $table->string('booster_time')->nullable();
            $table->unsignedBigInteger('center_id')->nullable();
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
        Schema::dropIfExists('man_power_schedules');
    }
}
