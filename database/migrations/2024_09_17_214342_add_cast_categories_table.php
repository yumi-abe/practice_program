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
        Schema::table('cast_categories', function (Blueprint $table) {
            $table->bigInteger('gender');
            $table->integer('age');
            $table->string('character');
            $table->string('main_image_path');
            $table->string('sub_image_path');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cast_categories', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('age');
            $table->dropColumn('character');
            $table->dropColumn('main_image_path');
            $table->dropColumn('sub_image_path');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
};
