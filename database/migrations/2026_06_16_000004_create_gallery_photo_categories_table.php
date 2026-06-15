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
        Schema::create('gallery_photo_categories', function (Blueprint $table) {
            $table->foreignId('photo_id')->constrained('gallery_photos')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('gallery_categories')->onDelete('cascade');
            $table->primary(['photo_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_photo_categories');
    }
};
