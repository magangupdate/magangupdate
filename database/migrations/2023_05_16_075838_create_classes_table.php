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
        Schema::create('classes', function (Blueprint $table) {
            $table->id('classID');
            $table->foreignId('mentorID')->nullable();
            $table->string('class_name');
            $table->string('volume');
            $table->string('logo');
            $table->string('class_slug')->unique();
            $table->text('description');
            $table->timestamp('class_session_1')->nullable();
            $table->timestamp('class_session_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
