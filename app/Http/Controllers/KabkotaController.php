<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota; //untuk menghubungkan ke model

class KabkotaController extends Controller
{
    public function getKabkotaData()
    {
        // Ambil semua data kabupaten/kota dari database
        $kabkota = Kabkota::all();

        // Kirim data kabkota ke view
        return view('kabkota', compact('kabkota'));
    }
}