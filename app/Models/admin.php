<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table = 'admin';

    protected $fillable = [
        'gambar',
        'posisi',
        'lokasi',
        'merk_barang',
        'type_barang',
        'jumlah_barang',
        'tanggal_masuk_barang',
        
    ];

}
