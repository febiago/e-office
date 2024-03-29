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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->unique();
            $table->string('pengirim');
            $table->string('perihal');
            $table->date('tgl_surat');
            $table->date('tgl_diterima');
            $table->string('ditujukan');
            $table->string('kategori');
            $table->string('keterangan');
            $table->string('image')->default('no_image.jpg');;
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
        Schema::dropIfExists('surat_masuks');
    }
};
