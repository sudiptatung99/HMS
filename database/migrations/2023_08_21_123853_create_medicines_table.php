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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('medicine_category_id')->nullable();     
            $table->string('unit')->nullable();   
            $table->string('quantity')->nullable();   
            $table->decimal('manufacturer_price', 10, 2)->nullable();   
            $table->decimal('selling_price', 10, 2)->nullable();       
            $table->string('batch_no')->nullable();    
            $table->string('expiry_date')->nullable();    
            $table->unsignedBigInteger('medicine_vendor_id')->nullable();   
            $table->string('manufacturer')->nullable();   
            $table->string('image')->nullable(); 
            $table->text('description')->nullable(); 
            $table->enum('status', ['In Stock', 'Out of Stock'])->nullable();  
            $table->timestamps();
            $table->foreign('medicine_category_id')->references('id')->on('medicine_categories')->onUpdate('cascade')->onDelete('cascade');  
            $table->foreign('medicine_vendor_id')->references('id')->on('medicine_vendors')->onUpdate('cascade')->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
