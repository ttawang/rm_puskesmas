<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

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

            $data = DB::table('jenis_pemeriksaan')->orderBy('id','desc')->get();
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
        $data['nama'] = $request->get('jenis_pemeriksaan');
        $data['keterangan'] = $request->get('keterangan');

        DB::beginTransaction();
        try{
            if($id == ''){
                $data['created_at'] = Carbon::now();
                DB::table('jenis_pemeriksaan')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('jenis_pemeriksaan')->where(array('id' => $id))->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}
        //return redirect()->to('pendaftaranpasien');
        return response()->json($arr);
    }
    public function edit($id){
        $data = DB::table('jenis_pemeriksaan')->where('id','=',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        $data = DB::table('jenis_pemeriksaan')->delete($id);
        DB::commit();
        return response()->json($data);

    }
}
