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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');                         // Portfolio Title
            $table->string('image')->nullable();              // Main Image
            $table->json('gallery_images')->nullable();       // Gallery Images (multiple)
            $table->string('portfolio_name');                 // Portfolio Name
            $table->string('live_link')->nullable();          // Live Project Link
            $table->longText('description')->nullable();      // Project Description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
