<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// untuk menampilkan data yang ada di database
class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsi';
    protected $fillable = [
        'name', 'kota', 'latitude', 'longitude', 'luas_wilayah', 'populasi', 'kepadatan', 'jumlah_suku'
    ];
}
