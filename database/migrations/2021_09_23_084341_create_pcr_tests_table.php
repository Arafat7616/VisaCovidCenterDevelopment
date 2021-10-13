<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcrTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcr_tests', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_pcr_test')->nullable();
            $table->enum('pcr_result', [0,1])->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('center_id')->unsigned();
            $table->enum('status', [0,1]);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
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
        Schema::dropIfExists('pcr_tests');
    }
}
