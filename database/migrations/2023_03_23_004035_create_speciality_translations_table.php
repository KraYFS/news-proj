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
        Schema::create('speciality_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('speciality_id')
                ->nullable()
                ->unsigned();

            $table->foreign('speciality_id')
                ->references('id')
                ->on('specialities')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')
                ->references('id')
                ->on('languages');

            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speciality_translations');
    }
};
