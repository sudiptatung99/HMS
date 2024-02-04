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
        Schema::create('medicine_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->nullable();     
            $table->unsignedBigInteger('patient_id')->nullable();     
            $table->unsignedBigInteger('doctor_id')->nullable();    
            $table->text('note')->nullable();     
            $table->decimal('total', 10, 2)->nullable();            
            $table->string('discount_percent')->nullable();     
            $table->decimal('discount', 10, 2)->nullable();     
            $table->string('gst_percent')->nullable();    
            $table->decimal('gst', 10, 2)->nullable();    
            $table->decimal('net_amount', 10, 2)->nullable();   
            $table->string('payment_mode')->nullable();   
            $table->decimal('payment_amount', 10, 2)->nullable();     
            $table->timestamps(); 
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');   
            $table->foreign('doctor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');    
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_invoices');
    }
};
