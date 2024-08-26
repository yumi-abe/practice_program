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
        Schema::create('reserve_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('email');
            $table->unsignedBigInteger('plan_category_id');
            $table->unsignedBigInteger('cast_category_id');
            // $table->timestamp('date');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('message')->nullable();
            $table->timestamps();

            $table->foreign('plan_category_id')->references('id')->on('plan_categories')->constrained();
            $table->foreign('cast_category_id')->references('id')->on('cast_categories')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserve_forms');
    }
};
