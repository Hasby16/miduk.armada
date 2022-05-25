<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['sewa_id', 'note', 'image_url'];

    public function sewa()
    {
        return $this->belongsTo(Sewa::class, 'sewa_id');
    }
}
