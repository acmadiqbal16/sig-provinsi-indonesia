<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//// untuk menampilkan data yang ada di database
class Kabkota extends Model
{
    use HasFactory;
    protected $table = 'kabkota';

    function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }
}
