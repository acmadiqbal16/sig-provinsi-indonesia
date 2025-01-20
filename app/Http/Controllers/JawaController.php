<?php

namespace App\Http\Controllers;
use App\Models\jawa;
use Illuminate\Http\Request;

class JawaController extends Controller
{
    public function index()
    {
        $jawas = jawa::all();
        return view('tematik.KepulauanSeribu', compact('jawas'));
    }
    
    public function Guru()
    {
        $jawas = jawa::all();
        return view('tematik.Guru', compact('jawas'));
    }
    
    public function sekolah()
    {
        $jawas = jawa::all();
        return view('tematik.sekolah', compact('jawas'));
    }
    
}
