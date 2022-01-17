<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_areas', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('minimum_space')->nullable();
            $table->string('maximum_space')->nullable();
            $table->string('furniture_and_others')->nullable();
            $table->string('category')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('center_areas');
    }
}
