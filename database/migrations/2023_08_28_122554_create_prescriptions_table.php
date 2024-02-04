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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();     
            $table->unsignedBigInteger('doctor_id')->nullable();  
            $table->string('weight')->nullable();
            $table->string('blood_pressure')->nullable(); 
            $table->string('date')->nullable(); 
            $table->string('reference')->nullable();  
            $table->decimal('visiting_fees', 10, 2)->nullable();  
            $table->text('patient_notes')->nullable();    
            $table->enum('prescription_type', ['New', 'Old'])->nullable();      
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
        Schema::dropIfExists('prescriptions');
    }
};
