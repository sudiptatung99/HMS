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
        Schema::create('microbiology_bill_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id')->nullable();
            $table->unsignedBigInteger('test_id')->nullable();
            $table->timestamps();
            $table->foreign('bill_id')->references('id')->on('microbiology_bills')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('test_id')->references('id')->on('microbiology_tests')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('microbiology_bill_tests');
    }
};
