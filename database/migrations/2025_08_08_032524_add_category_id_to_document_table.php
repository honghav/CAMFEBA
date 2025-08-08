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
        Schema::table('documents', function (Blueprint $table) {
            //
            $table->dropForeign(['legal_category_id']);
            $table->dropColumn('legal_category_id');

            // Add new foreign key column
            $table->foreignId('technical_id')->constrained('technicals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            //
            $table->dropForeign(['technical_id']);
            $table->dropColumn('technical_id');

            // Add the old column and foreign key back (optional)
            // $table->foreignId('legal_category_id')->constrained('legal_categories')->onDelete('cascade');

        });
    }
};
