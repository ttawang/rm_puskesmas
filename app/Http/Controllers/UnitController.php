<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use Carbon\Carbon;

class UnitController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Unit';
        return view('master.data-unit',$data);
    }

    public function get_data(Request $request)
    {
        $data = DB::table('unit')->orderBy('id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    //$actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm ">Delete</a>';
                    $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit" data-id="'.$row->id.'">Edit</button> <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'">Hapus</button>'.
                        '<input type="hidden" id="nama'.$row->id.'" value="'.$row->nama.'">';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function simpan(Request $request)
    {
        $id = $request->get('id');
        $data['nama'] = $request->get('nama');
        
        DB::beginTransaction();
        try{
            if($id == ''){
                $data['created_at'] = Carbon::now()->toDateString();
                DB::table('unit')->insert($data);
                //$arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now()->toDateString();
                DB::table('unit')->where(array('id' => $id))->update($data);
                //$arr = ['status' => '1'];
            }
            DB::commit();
		
		}catch (Exception $e){
			DB::rollback();
			//$arr = ['status' => '0'];
		}
        //return redirect()->to('master/data-dokter');
        //return response()->json($arr);
    }

    public function edit($id){
        $data = DB::table('unit')->where('id','=',$id)->first();

        return response()->json($data);
    }

    public function hapus($id){
        $data = DB::table('unit')->delete($id);
        DB::commit();
        return response()->json($data);

    }
}