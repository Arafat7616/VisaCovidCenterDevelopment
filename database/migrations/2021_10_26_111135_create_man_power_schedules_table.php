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
            $table->string('type')->comment('regular / premium');
            $table->string('morning_starting_time');
            $table->string('morning_ending_time');
            $table->string('day_starting_time');
            $table->string('day_ending_time');
            $table->string('total_volunteer');
            $table->timestamp('date');
            $table->string('pcr_time');
            $table->string('vaccine_time');
            $table->string('booster_time');
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
