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
        Schema::create('purchase_medicine_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_medicine_id')->nullable();       
            $table->string('name')->nullable();    
            $table->string('batch')->nullable();     
            $table->string('expiry_date')->nullable();       
            $table->decimal('mrp_per_unit', 10, 2)->nullable();       
            $table->string('quantity')->nullable();       
            $table->decimal('sub_total', 10, 2)->nullable();       
            $table->decimal('discount', 10, 2)->nullable();       
            $table->decimal('total', 10, 2)->nullable();       
            $table->timestamps(); 
            $table->foreign('purchase_medicine_id')->references('id')->on('purchase_medicines')->onUpdate('cascade')->onDelete('cascade');    
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_medicine_lists');
    }
};
