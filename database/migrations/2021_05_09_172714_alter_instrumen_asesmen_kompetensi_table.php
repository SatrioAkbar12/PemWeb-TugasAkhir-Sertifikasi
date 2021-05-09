<?php

use Facade\Ignition\Views\Compilers\BladeSourceMapCompiler;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInstrumenAsesmenKompetensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instrumen_asesmen_kompetensi', function (Blueprint $table) {
            $table->foreign('id_ref_unit_kompetensi')->references('id')->on('ref_unit_kompetensi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrumen_asesmen_kompetensi');
    }
}
