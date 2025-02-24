<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->string('prefix')->nullable();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('id_card')->unique();
        $table->date('birthdate')->nullable();
        $table->string('email');
        $table->dateTime('appointment_date');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('appointments');
}

};
