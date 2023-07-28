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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('age');
            $table->string('gender');
            $table->string('blood')->nullable();
            $table->string('disease')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('phone')->nullable();
            $table->integer('national_id')->nullable();
            $table->string('investigations')->nullable();
            $table->string('insurance')->nullable();
            $table->string('insurance_card')->nullable();
            $table->string('insurance_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
