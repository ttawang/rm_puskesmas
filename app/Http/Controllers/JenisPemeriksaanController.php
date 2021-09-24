<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisPemeriksaanController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Jenis Pemeriksaan';
        return view('master.data-jenis-pemeriksaan',$data);
    }

    public function get_data(Request $request)
    {
    
    }
}