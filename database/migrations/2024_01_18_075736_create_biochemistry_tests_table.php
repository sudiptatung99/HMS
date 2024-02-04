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
        Schema::create('biochemistry_tests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('method')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('gst_percent')->nullable();
            $table->decimal('gst', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('biochemistry_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biochemistry_tests');
    }
};
