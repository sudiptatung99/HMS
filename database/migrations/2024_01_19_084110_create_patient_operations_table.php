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
        Schema::create('patient_operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('operation_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->string('operation_date')->nullable();
            $table->string('assistant_consultant_one')->nullable();
            $table->string('assistant_consultant_two')->nullable();
            $table->string('anesthetist')->nullable();
            $table->string('anesthesia_type')->nullable();
            $table->string('ot_technician')->nullable();
            $table->string('ot_assistant')->nullable();
            $table->string('remark')->nullable();
            $table->string('result')->nullable();
            $table->timestamps();
            $table->foreign('doctor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('operation_id')->references('id')->on('operations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('operation_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_operations');
    }
};
