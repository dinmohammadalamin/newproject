<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class employee extends Migration
{
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('address');
            $table->string('city');
            $table->string('thana');
            $table->timestamps();
        });

        Schema::create('user_phones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('phone_number');
            $table->timestamps();
        });

        Schema::create('user_emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_emails');
        Schema::dropIfExists('user_phones');
        Schema::dropIfExists('employee');
    }
}
