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
        Schema::create('assessment_mentee_applications', function (Blueprint $table) {
            $table->id('assessmentID');
            $table->foreignId('menteeID');
            $table->integer('assessment0');
            $table->integer('assessment01');
            $table->integer('assessment02');
            $table->integer('assessment1');
            $table->integer('assessment2');
            $table->integer('assessment3');
            $table->integer('assessment4');
            $table->integer('assessment5');
            $table->integer('assessment6');
            $table->integer('assessment7');
            $table->integer('assessment8');
            $table->integer('assessment9');
            $table->integer('assessment10');
            $table->integer('assessment11');
            $table->integer('assessment12');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_mentee_applications');
    }
};
