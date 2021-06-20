<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHasilCollumnAsesorAsesorPendaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asesor_pendaftar', function (Blueprint $table) {
            $table->string('hasil')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asesor_pendaftar', function (Blueprint $table) {
            $table->string('hasil')->change();
        });
    }
}
