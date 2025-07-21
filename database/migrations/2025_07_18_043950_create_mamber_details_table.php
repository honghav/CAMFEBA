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
        Schema::create('member_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->unique();
            $table->string('logo')->nullable();
            $table->string('link')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->enum('status',['Active','Unactive'])->default('Unactive');
            $table->date('payment_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->string('industry')->nullable();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_details');
    }
};
