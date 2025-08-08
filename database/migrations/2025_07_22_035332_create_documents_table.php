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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('cover')->nullable();
            $table->string('file_path');
            $table->date('published_at')->nullable();
            $table->enum('type', ['Royal_kram', 'Sub_decree', 'Ministry_order', 'Other'])->default('Other');
            $table->enum('status',['free','paid'])->default('free'); // draft, published, archived
            $table->foreignId('legal_category_id')->constrained('legal_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse themigrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
