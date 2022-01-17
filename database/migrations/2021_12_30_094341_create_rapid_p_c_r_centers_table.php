<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapidPCRCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapid_p_c_r_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('airport_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->text('map_location')->nullable();
            $table->string('trade_licence_no')->nullable();
            $table->string('status')->default(0);
            $table->string('varification_status')->default(0);
            $table->integer('space')->nullable();
            $table->unsignedBigInteger('center_area_id')->nullable();
            $table->string('waiting_seat_capacity')->nullable();
            $table->unsignedBigInteger('administrator_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapid_p_c_r_centers');
    }
}
