<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Diagnosa';
        return view('master.data-diagnosa',$data);
    }

    public function get_data(Request $request)
    {
    
    }
}