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
        Schema::create('o_p_d_bills', function (Blueprint $table) {
            $table->id();
            $table->string('bill_no')->nullable();
            $table->unsignedBigInteger('opd_patient_id')->nullable();
            $table->string('bill_date')->nullable();  
            $table->decimal('total', 10, 2)->nullable();
            $table->string('discount_percent')->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->string('gst_percent')->nullable();
            $table->decimal('gst', 10, 2)->nullable();
            $table->decimal('payable', 10, 2)->nullable();
            $table->enum('payment_status', ['Paid', 'Unpaid'])->nullable();
            $table->string('payment_mode')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->foreign('opd_patient_id')->references('id')->on('o_p_d_patients')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_p_d_bills');
    }
};
