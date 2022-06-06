<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'table_books';

    protected $fillable = ['judul_book','pengarang','penerbit'];
}
