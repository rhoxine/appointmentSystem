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
        Schema::create('special_cases', function (Blueprint $table) {
            $table->increments('special_case_id');
            $table->integer('service_id');
            $table->string('owner_name');
            $table->string('pet_name');
            $table->integer('age');
            $table->string('pet_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_cases');
    }
};
