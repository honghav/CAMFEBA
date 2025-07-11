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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('cover')->nullable();
            $table->date('start_date');
            $table->text('lacation')->nullable();
            $table->float('price')->nullable();
            $table->time('sart_time')->nullable();
            $table->time('end_time')->nullable();
            $table->text('register_link');
            $table->datetime('end_register')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
