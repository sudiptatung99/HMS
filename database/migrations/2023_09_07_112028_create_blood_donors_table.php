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
        Schema::create('blood_donors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();         
            $table->string('dob')->nullable();  
            $table->string('blood_group')->nullable();  
            $table->string('gender')->nullable();  
            $table->string('father_name')->nullable();   
            $table->string('contact')->nullable();  
            $table->text('address')->nullable();  
            $table->enum('donate_status', ['0', '1'])->default('0');            
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_donors');
    }
};
