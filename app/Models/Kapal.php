<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'jenis',
        'kapasitas',
        'panjang',
        'sewa_sekali_jalan',
        'sewa_hari',
        'sewa_jam',
        'description',
        'image_url',
    ];
}
