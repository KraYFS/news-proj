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
        Schema::create('employees_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employees_id')
                ->nullable()
                ->unsigned();

            $table->foreign('employees_id')
                ->references('id')
                ->on('employees')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')
                ->references('id')
                ->on('languages');

            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_translations');
    }
};
