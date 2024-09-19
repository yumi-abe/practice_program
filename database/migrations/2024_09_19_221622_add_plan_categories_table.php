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
        Schema::table('plan_categories', function (Blueprint $table) {
            $table->integer('weekday_price');
            $table->integer('holiday_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_categories', function (Blueprint $table) {
            $table->integer('weekday_price');
            $table->integer('holiday_price');
        });
    }
};
