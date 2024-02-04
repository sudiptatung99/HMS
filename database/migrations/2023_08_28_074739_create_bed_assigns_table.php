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
        Schema::create('bed_assigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();    
            $table->unsignedBigInteger('room_id')->nullable();    
            $table->unsignedBigInteger('bed_id')->nullable();    
            $table->string('assign_date')->nullable();     
            $table->text('description')->nullable();      
            $table->enum('status', ['Active', 'Inactive'])->nullable();    
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');  
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');  
            $table->foreign('bed_id')->references('id')->on('beds')->onUpdate('cascade')->onDelete('cascade');  
        }); 
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bed_assigns');
    }
};
