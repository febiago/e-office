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
            $table->foreignId('surat_keluar_id')->references('id')->on('surat_keluars');
            $table->foreignId('pegawai_id')->references('id')->on('pegawais');
            $table->foreignId('jenis_sppd_id')->references('id')->on('jenis_sppds');
            $table->foreignId('kegiatan_id')->references('id')->on('kegiatans');
            $table->enum('jenis', ['inti', 'pengikut'])->default('inti');
            $table->string('kendaraan');
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->string('tujuan');
            $table->string('dasar');
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
