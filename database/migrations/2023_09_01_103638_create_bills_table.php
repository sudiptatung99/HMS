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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('bill_no')->nullable(); 
            $table->string('bill_date')->nullable();  
            $table->unsignedBigInteger('patient_id')->nullable();   
            $table->decimal('package_charge', 10, 2)->nullable();   
            $table->decimal('service_charge', 10, 2)->nullable();   
            $table->decimal('bed_charge', 10, 2)->nullable();   
            $table->decimal('total', 10, 2)->nullable();    
            $table->string('discount_percent')->nullable();   
            $table->decimal('discount', 10, 2)->nullable();   
            $table->string('gst_percent')->nullable();   
            $table->decimal('gst', 10, 2)->nullable();   
            $table->decimal('advance_paid', 10, 2)->nullable();   
            $table->decimal('insurance', 10, 2)->nullable();    
            $table->decimal('payable', 10, 2)->nullable();    
            $table->text('note')->nullable();      
            $table->string('payment_mode')->nullable();   
            $table->enum('payment_status', ['Paid', 'Unpaid'])->nullable();     
            $table->timestamps(); 
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
