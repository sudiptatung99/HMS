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
        Schema::create('invoice_medicine_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_invoice_id')->nullable();     
            $table->unsignedBigInteger('medicine_id')->nullable();     
            $table->string('expiry_date')->nullable();    
            $table->string('quantity')->nullable();     
            $table->decimal('price', 10, 2)->nullable();       
            $table->timestamps(); 
            $table->foreign('medicine_invoice_id')->references('id')->on('medicine_invoices')->onUpdate('cascade')->onDelete('cascade');   
            $table->foreign('medicine_id')->references('id')->on('medicines')->onUpdate('cascade')->onDelete('cascade');    
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_medicine_lists');
    }
};
