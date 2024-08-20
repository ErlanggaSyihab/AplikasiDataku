<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table = 'admin';

    protected $fillable = [
        'nama_barang',
        'tanggal_masuk_barang',
        'jenis_barang',
        'lokasi',
    ];

}
