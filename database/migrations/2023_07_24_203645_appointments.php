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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('patient');
            $table->string('doctor_id');
            $table->string('doctor');
            $table->longText('history');
            $table->string('diagnosis');
            $table->string('laboratory');
            $table->string('radiology');
            $table->string('medicine');
            $table->string('date');
            $table->string('status')->default('on_progress');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
