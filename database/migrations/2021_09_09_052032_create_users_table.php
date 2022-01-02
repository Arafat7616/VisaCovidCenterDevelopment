<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('password')->nullable();
            $table->text('image')->nullable();
            $table->string('user_type');
            $table->integer('otp')->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('center_id')->nullable();
            $table->unsignedBigInteger('rapid_pcr_center_id')->nullable();
            $table->unsignedBigInteger('immigration_center_id')->nullable();
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
        Schema::dropIfExists('users');
    }
}
