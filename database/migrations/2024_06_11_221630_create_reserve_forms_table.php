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
            $table->string('name', 20);
            $table->string('email', 255)->unique(); //emailが被らないようにする
            $table->dateTime('date');//日時選択
            $table->text('message', 255);//メッセージ
            $table->timestamps();
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
