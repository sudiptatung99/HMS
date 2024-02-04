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
        Schema::create('o_p_d_patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id')->nullable();
            $table->string('uhid')->nullable();
            $table->string('name')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('blood_group')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('admission_date')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->text('purpose')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('image')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Discharge'])->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_p_d_patients');
    }
};
