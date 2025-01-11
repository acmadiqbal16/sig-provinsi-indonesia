<?php

namespace App\Http\Controllers;
use App\Models\Provinsi; //untuk menghubungkan ke model


use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function getProvinsiData()
    {
        // Ambil semua data provinsi dari database
        $provinsi = Provinsi::all();

        // Kirim data provinsi ke view
        return view('provinsi', compact('provinsi'));
    }



    // tabel jika eror hapusi ini saja
    public function showTable()
    {
    $provinsi = Provinsi::all(); // Ambil semua data provinsi dari database
    return view('provinsi_tabel', compact('provinsi')); // Kirim data ke view tabel
    }
    // sampe sini
}
