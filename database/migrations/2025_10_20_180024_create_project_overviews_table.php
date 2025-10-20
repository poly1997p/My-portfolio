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
        Schema::create('project_overviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id');     // Foreign key to portfolios
            $table->string('icon')->nullable();              // Icon class or image
            $table->string('title');                         // Overview title
            $table->text('description')->nullable();         // Overview description
            $table->timestamps();

            // Foreign Key Relationship
            $table->foreign('portfolio_id')
                  ->references('id')
                  ->on('portfolios')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_overviews');
    }
};
