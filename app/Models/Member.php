<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'table_members';

    protected $fillable = ['nis','nama_member','jk','rayon',
                            'rombel'];
}
