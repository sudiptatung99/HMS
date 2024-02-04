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
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();      
            $table->unsignedBigInteger('department_id')->nullable();    
            $table->unsignedBigInteger('doctor_id')->nullable();  
            $table->string('date')->nullable();   
            $table->string('appoinment_date')->nullable();   
            $table->string('serial_no')->nullable();   
            $table->text('problem')->nullable();   
            $table->unsignedBigInteger('assign_by_id')->nullable();      
            $table->enum('status', ['Active', 'Inactive'])->nullable();     
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');   
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreign('doctor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');  
            $table->foreign('assign_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');   
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoinments');
    }
};
