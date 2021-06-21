<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCollumnPendaftarInstrumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftar_instrumen', function (Blueprint $table) {
            $table->string('path_bukti')->nullable()->change();
            $table->text('komentar_bukti')->nullable()->change();
            $table->text('jawaban_asesor_verifikasi')->nullable()->change();
            $table->string('verified_by')->nullable()->change();
            $table->timestamp('verified_at')->nullable()->default(null)->change();
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
            $table->string('path_bukti')->nullable(false)->change();
            $table->text('komentar_bukti')->nullable(false)->change();
            $table->text('jawaban_asesor_verifikasi')->nullable(false)->change();
            $table->string('verified_by')->nullable(false)->change();
            $table->timestamp('verified_at')->nullable(false)->change();
        });
    }
}
