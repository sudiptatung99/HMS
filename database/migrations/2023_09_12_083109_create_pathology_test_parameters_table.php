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
        Schema::create('pathology_test_parameters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parameter_id')->nullable();      
            $table->unsignedBigInteger('test_id')->nullable();     
            $table->timestamps();
            $table->foreign('parameter_id')->references('id')->on('pathology_parameters')->onUpdate('cascade')->onDelete('cascade');    
            $table->foreign('test_id')->references('id')->on('pathology_tests')->onUpdate('cascade')->onDelete('cascade');    
        }); 
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathology_test_parameters');
    }
};
