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
        Schema::create('sppds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_surat_keluar')->references('id')->on('surat_keluars');
            $table->foreignId('id_pegawai')->references('id')->on('pegawais');
            $table->foreignId('id_jenis')->references('id')->on('jenis_sppds');
            $table->enum('jenis', ['inti', 'pengikut'])->default('inti');
            $table->date('tgl_sppd');
            $table->string('keperluan');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sppds');
    }
};
