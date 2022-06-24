<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class RujukanPasienController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Rujukan Pasien';


        return view('tindakan.rujukan-pasien',$data);
    }

    public function get_data(Request $request)
    {

    }

    public function simpan(Request $request)
    {

    }
    public function edit($id){

    }
    public function hapus($id){

    }
}
