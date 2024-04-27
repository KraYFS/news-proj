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
        Schema::create('article_creators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id')
                ->nullable()
                ->unsigned();
            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('employees_id');
            $table->foreign('employees_id')
                ->references('id')
                ->on('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_creators');
    }
};
