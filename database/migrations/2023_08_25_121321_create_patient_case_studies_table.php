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
        Schema::create('patient_case_studies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();     
            $table->string('food_allergies')->nullable();   
            $table->string('tendency_bleed')->nullable();   
            $table->string('heart_disease')->nullable();   
            $table->string('high_blood_pressure')->nullable();   
            $table->string('diabetic')->nullable();   
            $table->string('surgery')->nullable();   
            $table->string('accident')->nullable();   
            $table->string('others')->nullable();   
            $table->string('family_medical_history')->nullable();   
            $table->string('current_medication')->nullable();   
            $table->string('female_pregnancy')->nullable();   
            $table->string('breast_feeding')->nullable();   
            $table->string('health_insurance')->nullable();   
            $table->string('low_income')->nullable();   
            $table->string('reference')->nullable();    
            $table->enum('status', ['Active', 'Inactive'])->nullable(); 
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_case_studies');
    }
};
