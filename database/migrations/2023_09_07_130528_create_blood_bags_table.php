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
        Schema::create('blood_bags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id')->nullable();  
            $table->string('blood_group')->nullable();   
            $table->string('donate_date')->nullable();         
            $table->string('bag')->nullable();  
            $table->string('volume')->nullable();  
            $table->string('unit_type')->nullable();  
            $table->string('lot')->nullable();     
            $table->text('note')->nullable();   
            $table->enum('issue_status', ['0', '1'])->default('0');       
            $table->timestamps();
            $table->foreign('donor_id')->references('id')->on('blood_donors')->onUpdate('cascade')->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_bags');
    }
};
