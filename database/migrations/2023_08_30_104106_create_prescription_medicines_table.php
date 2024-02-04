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
        Schema::create('prescription_medicines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prescription_id')->nullable();  
            $table->string('name')->nullable();   
            $table->string('type')->nullable();   
            $table->text('instruction')->nullable();    
            $table->string('days')->nullable();    
            $table->timestamps();
            $table->foreign('prescription_id')->references('id')->on('prescriptions')->onUpdate('cascade')->onDelete('cascade');  
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_medicines');
    }
};
