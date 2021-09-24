<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Dokter';
        return view('master.data-dokter',$data);
    }

    public function get_data(Request $request)
    {
    
    }
}