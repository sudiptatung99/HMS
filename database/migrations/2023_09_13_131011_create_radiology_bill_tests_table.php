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
        Schema::create('radiology_bill_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id')->nullable();       
            $table->unsignedBigInteger('test_id')->nullable();      
            $table->timestamps();
            $table->foreign('bill_id')->references('id')->on('pathology_bills')->onUpdate('cascade')->onDelete('cascade');     
            $table->foreign('test_id')->references('id')->on('pathology_tests')->onUpdate('cascade')->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radiology_bill_tests');
    }
};
