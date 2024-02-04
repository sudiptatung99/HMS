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
        Schema::create('purchase_medicines', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();            
            $table->string('invoice_id')->nullable();             
            $table->string('manufacturer')->nullable();              
            $table->decimal('sub_total', 10, 2)->nullable();               
            $table->decimal('discount', 10, 2)->nullable();       
            $table->decimal('gst', 10, 2)->nullable();     
            $table->decimal('total', 10, 2)->nullable();     
            $table->string('payment_mode')->nullable();   
            $table->decimal('payment_amount', 10, 2)->nullable();    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_medicines');
    }
};
