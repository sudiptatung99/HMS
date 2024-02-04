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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable(); 
            $table->string('expense')->nullable(); 
            $table->string('pay_to_whom')->nullable(); 
            $table->decimal('amount', 10, 2)->nullable(); 
            $table->string('payment_mode')->nullable();   
            $table->string('image')->nullable();       
            $table->text('details')->nullable();      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
