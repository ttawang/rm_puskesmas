<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataDokterController extends Controller
{
    //
     public function index()
    {
        $data['judul'] = 'Data Dokter';
        return view('master.data-dokter',$data);
    }
}
