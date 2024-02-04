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
        Schema::create('package_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id')->nullable();   
            $table->unsignedBigInteger('service_id')->nullable();   
            $table->string('quantity')->nullable();     
            $table->timestamps();
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');    
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');    
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_services');
    }
};
