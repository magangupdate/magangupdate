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
        Schema::create('mentees', function (Blueprint $table) {
            $table->id('menteeID');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('university');
            $table->string('major');
            $table->string('whatsapp_number');
            $table->string('instagram');
            $table->foreignId('first_class');
            $table->text('reason_first_class');
            $table->foreignId('second_class');
            $table->text('reason_second_class');
            $table->string('cv');
            $table->string('twibbon_screenshot')->nullable();
            $table->string('repost_screenshot')->nullable();
            $table->string('tag_screenshot')->nullable();
            $table->string('subscribe_screenshot')->nullable();
            $table->text('q1');
            $table->text('q2');
            $table->text('q3')->nullable();
            $table->text('q4');
            $table->text('q5');
            $table->text('q6');
            $table->text('q7');
            $table->enum('q8', [0, 1]);
            $table->integer('total_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentee_applications');
    }
};
