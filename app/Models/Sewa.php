<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'kapal_id', 'jenis_sewa', 'status', 'tanggal_sewa', 'tanggal_selesai', 'jam_sewa', 'jam_selesai', 'uang_muka',];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kapal()
    {
        return $this->belongsTo(Kapal::class, 'kapal_id');
    }
}
