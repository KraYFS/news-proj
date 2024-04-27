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
        Schema::create('press_requests', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('surname')->nullable();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->tinyInteger('car')->default(0);

            $table->unsignedBigInteger('speciality_id')->nullable()->unsigned();
            $table->foreign('speciality_id')
                ->references('id')
                ->on('specialities')
                ->cascadeOnDelete();

            $table->tinyInteger('term')->default(0);
            $table->string('region');
            $table->string('city');
            $table->string('steer')->nullable();
            $table->string('house')->nullable();
            $table->string('apartment')->nullable();

            $table->unsignedBigInteger('delivery_addresses_city')->nullable()->unsigned();
            $table->foreign('delivery_addresses_city')
                ->references('id')
                ->on('cities')
                ->cascadeOnDelete();

            $table->integer('delivery_addresses_department')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('photo_id')->nullable()->unsigned();
            $table->foreign('photo_id')
                ->references('id')
                ->on('files')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('press_requests');
    }
};
