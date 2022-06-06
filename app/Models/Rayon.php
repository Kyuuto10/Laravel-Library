<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $tabel = 'rayons';

    protected $fillable = ['rayon','pem_rayon'];
}
