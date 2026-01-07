<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lapangan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_lapangan';

    protected $fillable = [
        'gambar',
        'nama_lapangan',
        'jenis',
        'lokasi',
        'kondisi',
        'harga_per_jam',
        'jam_buka',
        'jam_tutup',
        'deskripsi',
        'kontak',
    ];
}
