<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDropCollumnAsesiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asesi', function (Blueprint $table) {
            $table->string('nama');
            $table->dropColumn('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asesi', function (Blueprint $table) {
            $table->dropColumn('nama');
            $table->string('email');
        });
    }
}
