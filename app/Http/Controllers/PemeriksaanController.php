<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Pemeriksaan';
        return view('master.data-pemeriksaan',$data);
    }

    public function get_data(Request $request)
    {
    
    }
}