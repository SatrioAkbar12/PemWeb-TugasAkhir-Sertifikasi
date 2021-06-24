<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMakeNullablePendaftarInstrumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftar_instrumen', function (Blueprint $table) {
            $table->string('jawaban_self_asesmen')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftar_instrumen', function (Blueprint $table) {
            $table->string('jawaban_self_asesmen')->change();
        });
    }
}
