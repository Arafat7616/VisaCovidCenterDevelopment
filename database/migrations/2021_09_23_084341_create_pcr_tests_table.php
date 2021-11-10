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
            $table->string('registration_type')->default('normal')->comment('normal','premium');
            $table->string('date_of_registration')->nullable();
            $table->timestamp('sample_collection_date')->nullable();
            $table->timestamp('date_of_pcr_test')->nullable();
            $table->timestamp('result_published_date')->nullable();
            $table->string('pcr_result')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('center_id')->nullable();
            $table->unsignedBigInteger('tested_by')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('pcr_tests');
    }
}
