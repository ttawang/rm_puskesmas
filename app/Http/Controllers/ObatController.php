<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObatController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Obat';
        return view('master.data-obat',$data);
    }

    public function get_data(Request $request)
    {
    
    }
}