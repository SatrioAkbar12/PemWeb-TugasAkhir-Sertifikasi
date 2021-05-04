<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumenAsesmenKompetensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumen_asesmen_kompetensi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ref_unit_kompetensi');
            $table->string('instrumen_pertanyaan');
            $table->string('status_instrumen');
            $table->boolean('is_aktif');

            $table->foreign('id_ref_unit_kompetensi')->references('id')->on('ref_unit_kompetensi')->onDelete('cascade');
            // $table->timestamps();
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
