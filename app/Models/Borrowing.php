<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $table = 'table_borrowings';

    protected $fillable = ['nis','nama_member', 'rombel', 'rayon','judul_book','petugas','tgl_pinjam','tgl_kembali', 'status'];
}
