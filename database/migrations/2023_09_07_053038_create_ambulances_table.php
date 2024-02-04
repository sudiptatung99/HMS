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
        Schema::create('ambulances', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_number')->nullable();        
            $table->string('vehicle_model')->nullable();  
            $table->string('year_made')->nullable();  
            $table->string('driver_name')->nullable();  
            $table->string('driver_license')->nullable();  
            $table->string('driver_contact')->nullable();  
            $table->string('vehicle_type')->nullable();  
            $table->text('note')->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulances');
    }
};
