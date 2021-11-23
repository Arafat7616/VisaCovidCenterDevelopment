<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('pcr_normal')->nullable();
            $table->string('vaccine_normal')->nullable();
            $table->string('booster_normal')->nullable();
            $table->string('pcr_premium')->nullable();
            $table->string('vaccine_premium')->nullable();
            $table->string('booster_premium')->nullable();
            $table->unsignedBigInteger('center_id')->nullable();
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
        Schema::dropIfExists('prices');
    }
}
