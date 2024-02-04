<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();    
            $table->string('image')->nullable();
            $table->string('dob')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('blood_group')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();      
            $table->text('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('career_title')->nullable();
            $table->string('resume')->nullable();
            $table->text('short_biogrphy')->nullable();
            $table->string('specialist')->nullable();
            $table->string('language')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->nullable(); 
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onUpdate('cascade')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};