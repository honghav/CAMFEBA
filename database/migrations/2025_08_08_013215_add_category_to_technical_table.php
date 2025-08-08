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
        Schema::table('technicals', function (Blueprint $table) {
            //
            $table->enum('category_page', ['technical', 'legal', 'research', 'conultation','compliance'])->default('technical');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technicals', function (Blueprint $table) {
            //
            $table->dropColumn('category_page');
        });
    }
};
