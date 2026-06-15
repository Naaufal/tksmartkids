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
        Schema::create('gallery_photos', function (Blueprint $table) {
            $table->id();
            $table->string('filename', 255);
            $table->string('storage_path', 500);
            $table->text('public_url');
            $table->string('alt_text', 255)->nullable();
            $table->uuid('uploaded_by')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->foreign('uploaded_by')->references('id')->on('user_profiles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_photos');
    }
};
