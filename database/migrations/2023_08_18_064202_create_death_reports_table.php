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
        Schema::create('death_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();     
            $table->string('date_of_death')->nullable(); 
            $table->string('place_of_death')->nullable();   
            $table->string('deceased_address')->nullable(); 
            $table->string('deceased_permanent_address')->nullable(); 
            $table->unsignedBigInteger('doctor_id')->nullable();    
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');  
            $table->foreign('doctor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');  
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('death_reports');
    }
};
