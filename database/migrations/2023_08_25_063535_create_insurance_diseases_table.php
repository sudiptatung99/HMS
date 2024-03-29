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
        Schema::create('insurance_diseases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_id')->nullable();  
            $table->string('name')->nullable();    
            $table->string('details')->nullable();     
            $table->timestamps();
            $table->foreign('insurance_id')->references('id')->on('insurances')->onUpdate('cascade')->onDelete('cascade');     
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_diseases');
    }
};
