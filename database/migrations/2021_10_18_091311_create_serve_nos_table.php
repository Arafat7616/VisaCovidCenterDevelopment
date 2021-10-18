<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServeNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serve_nos', function (Blueprint $table) {
            $table->id();
            $table->string('pcr')->nullable();
            $table->string('vaccine')->nullable();
            $table->string('booster')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('serve_nos');
    }
}
