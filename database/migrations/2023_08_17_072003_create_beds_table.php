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
        Schema::create('beds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->nullable();    
            $table->string('bed_no')->nullable();
            $table->string('bed_type')->nullable();
            $table->decimal('bed_charge', 10, 2)->nullable(); 
            $table->enum('status', ['Available', 'Booked'])->nullable(); 
            $table->timestamps(); 
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beds');
    }
};
