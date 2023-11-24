<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('client_id');
            $table->integer('user_id');
            $table->date('appointment_date');
            $table->string('owner_name');
            $table->string('pet_type');
            $table->string('contact');
            $table->string('breed');
            $table->string('email_address');
            $table->integer('age');
            $table->string('address');
            $table->string('service');
            $table->integer('status')->default(0);
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
