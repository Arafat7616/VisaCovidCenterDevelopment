<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('pcr_normal')->nullable();
            $table->string('vaccine_normal')->nullable();
            $table->string('booster_normal')->nullable();
            $table->string('pcr_premimum')->nullable();
            $table->string('vaccine_premimum')->nullable();
            $table->string('boster_premimum')->nullable();
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
        Schema::dropIfExists('pricings');
    }
}
