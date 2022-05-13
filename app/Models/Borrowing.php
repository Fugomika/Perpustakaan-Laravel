<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $table = 'borrowings';
    protected $fillable = ['nis','nama_peminjam','rombel','rayon','judul_buku','tgl_pinjam','tgl_kembali','petugas','status'];	
    
}
