<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;

class PendaftaranPasienController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Pendaftaran Pasien';
        return view('pasien.pendaftaranpasien',$data);
    }

    public function get_data(Request $request)
    {
    
            $data = DB::table('pasien')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    
    }
}
