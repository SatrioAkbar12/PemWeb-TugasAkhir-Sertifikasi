<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesi', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->unsignedBigInteger('id_ref_negara')->nullable();
            $table->text('alamat');
            $table->string('no_telepon');
            $table->string('email');
            $table->string('kualifikasi_pendidikan');
            $table->unsignedBigInteger('id_unit')->nullable();
            $table->timestamps();
            $table->string('created_by');
            $table->string('edited_by');
            $table->unsignedBigInteger('id_user');

            // $table->foreign('id_ref_negara')->references('id')->on('ref_negara')->onDelete('cascade');
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesi');
    }
}
