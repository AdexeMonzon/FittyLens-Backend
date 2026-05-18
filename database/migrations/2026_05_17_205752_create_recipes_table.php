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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('instructions')->nullable();
            $table->integer('prep_time')->default(0);
            $table->enum('difficulty', ['fácil', 'medio', 'difícil'])->default('medio');
            $table->string('image_url')->nullable();
            $table->json('ingredients')->nullable(); // AI generic ingredients list
            $table->json('allergens')->nullable(); // Fast tag checks (e.g. gluten, lactose)
            $table->boolean('is_ai_generated')->default(false);
            $table->string('search_query')->nullable()->index(); // Cache query hit/miss
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
