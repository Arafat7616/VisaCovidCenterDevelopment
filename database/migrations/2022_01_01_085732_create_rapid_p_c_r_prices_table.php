<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapidPCRPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapid_p_c_r_prices', function (Blueprint $table) {
            $table->id();
            $table->string('pcr_normal')->nullable();
            $table->string('pcr_premium')->nullable();
            $table->unsignedBigInteger('rapid_pcr_center_id')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('rapid_p_c_r_prices');
    }
}
