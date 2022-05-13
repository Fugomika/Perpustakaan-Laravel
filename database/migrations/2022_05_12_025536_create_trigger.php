<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER update_student AFTER UPDATE ON students FOR EACH ROW
        BEGIN
           UPDATE borrowings SET nis=NEW.nis, nama_peminjam=NEW.nama WHERE nis=OLD.nis;
        END');

        DB::unprepared('CREATE TRIGGER update_rombel AFTER UPDATE ON rombels FOR EACH ROW
                BEGIN
                   UPDATE students SET rombel=NEW.nama_rombel WHERE rombel=OLD.nama_rombel;
                   UPDATE borrowings SET rombel=NEW.nama_rombel WHERE rombel=OLD.nama_rombel;
                END');
        
        DB::unprepared('CREATE TRIGGER update_rayon AFTER UPDATE ON rayons FOR EACH ROW
        BEGIN
           UPDATE students SET rayon=NEW.nama_rayon WHERE rayon=OLD.nama_rayon;
           UPDATE borrowings SET rayon=NEW.nama_rayon WHERE rayon=OLD.nama_rayon;
        END');

        DB::unprepared('CREATE TRIGGER update_book AFTER UPDATE ON books FOR EACH ROW
        BEGIN
            UPDATE borrowings SET judul_buku=NEW.judul_buku WHERE judul_buku=OLD.judul_buku;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `update_rombel`');
    }
};
