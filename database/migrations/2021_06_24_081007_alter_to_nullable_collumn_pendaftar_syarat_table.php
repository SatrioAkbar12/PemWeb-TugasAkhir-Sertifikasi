<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterToNullableCollumnPendaftarSyaratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftar_syarat', function (Blueprint $table) {
            $table->string('path_bukti')->nullable()->change();
            $table->string('verified_at')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftar_syarat', function (Blueprint $table) {
            $table->string('path_bukti')->change();
            $table->string('verified_at')->default(null)->change();
        });
    }
}
