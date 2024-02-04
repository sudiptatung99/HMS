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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slot_id')->nullable();  
            $table->unsignedBigInteger('doctor_id')->nullable();  
            $table->string('available_days')->nullable();    
            $table->string('available_start_time')->nullable();     
            $table->string('available_end_time')->nullable();      
            $table->string('per_patient_time')->nullable();       
            $table->enum('status', ['Active', 'Inactive'])->nullable();   
            $table->timestamps();
            $table->foreign('slot_id')->references('id')->on('slots')->onUpdate('cascade')->onDelete('cascade');      
            $table->foreign('doctor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');       
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
