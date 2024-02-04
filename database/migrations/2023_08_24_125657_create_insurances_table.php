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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();    
            $table->string('consultant_name')->nullable();    
            $table->string('policy_name')->nullable();    
            $table->string('policy_no')->nullable();    
            $table->string('policy_holder_name')->nullable();    
            $table->string('insurance_name')->nullable();    
            $table->decimal('total', 10, 2)->nullable();   
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
        Schema::dropIfExists('insurances');
    }
};
