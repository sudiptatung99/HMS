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
        Schema::create('operation_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();     
            $table->string('date_of_operation')->nullable();  
            $table->string('preoperative_diagnosis')->nullable();  
            $table->string('procedure')->nullable();  
            $table->text('surgeon')->nullable();   
            $table->text('assistant')->nullable();   
            $table->string('anesthesia')->nullable();  
            $table->string('anesthesiologist')->nullable();  
            $table->text('description')->nullable();   
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operation_reports');
    }
};
