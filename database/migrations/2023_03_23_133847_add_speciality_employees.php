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
        Schema::table('employees', function (Blueprint $table) {

            $table->unsignedBigInteger('speciality_id')
                ->after('id')
                ->nullable()
                ->unsigned();

            $table->foreign('speciality_id')
                ->references('id')
                ->on('specialities')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_speciality_id_foreign');
            $table->dropColumn('speciality_id');
        });
    }
};
