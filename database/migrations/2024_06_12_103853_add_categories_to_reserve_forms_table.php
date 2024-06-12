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
        Schema::table('reserve_forms', function (Blueprint $table) {
            $table->foreignId('plan_category_id') //プランカテゴリ(FK)
            ->after('email')
            ->constrained();
            
            $table->foreignId('cast_category_id')//キャストカテゴリ(FK)
            ->after('plan_category_id')
            ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reserve_forms', function (Blueprint $table) {
            //
        });
    }
};
