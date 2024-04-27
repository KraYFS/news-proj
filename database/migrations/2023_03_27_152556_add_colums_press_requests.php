<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('press_requests', function (Blueprint $table) {
            $table->string('car_number')->after('car')->nullable();
            $table->string('car_brand')->after('car')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('press_requests', function (Blueprint $table) {
            $table->dropColumn('car_number');
            $table->dropColumn('car_brand');
        });
    }
};
