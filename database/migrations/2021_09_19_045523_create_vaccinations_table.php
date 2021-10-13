<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_vaccine')->nullable();
            $table->date('date_of_first_dose')->nullable();
            $table->date('date_of_second_dose')->nullable();
            $table->date('antibody_last_date')->nullable();
            $table->enum('status', [0,1]);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('center_id')->unsigned();
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
        Schema::dropIfExists('vaccinations');
    }
}
