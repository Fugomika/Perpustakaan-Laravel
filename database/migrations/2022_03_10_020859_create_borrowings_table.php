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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('nis');
            $table->string('nama_peminjam');
            $table->string('rombel');
            $table->string('rayon');
            $table->string('judul_buku');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->string('petugas');
            $table->string('status');
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
        Schema::dropIfExists('borrowings');
    }
};
