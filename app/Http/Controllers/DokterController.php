<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class DokterController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Dokter Puskesmas';
        $data['spesialis'] = DB::table('spesialis')->get();
        $data['jabatan'] = DB::table('jabatan')->get();
        $data['statkepegawaian'] = DB::table('statkepegawaian')->get();

        return view('master.data-dokter',$data);
    }

    public function get_data(Request $request)
    {

            $data = DB::table('dokter as d')
            ->join('spesialis as sp','d.id_spesialis','sp.id')
            ->join('jabatan as jb','d.id_jabatan','jb.id')
            ->join('statkepegawaian as sk','d.id_statkepegawaian','sk.id')
            ->select(DB::raw('
                d.*,
                sp.nama as spesialis,
                jb.nama as jabatan,
                sk.nama as statkepegawaian
            '))
            ->orderBy('d.id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function($row){
                    //$actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm ">Delete</a>';
                    $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit" data-id="'.$row->id.'">Edit</button> <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'">Hapus</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);

    }

    public function simpan(Request $request)
    {
        $id = $request->get('id');
        $data['nama'] = $request->get('nama');
        $data['jenis_kelamin'] = $request->get('jenis_kelamin');
        $data['telephone'] = $request->get('no_hp');
        $data['alamat'] = $request->get('alamat');
        $data['email'] = $request->get('email');
        $data['id_spesialis'] = $request->get('spesialis');
        $data['id_jabatan'] = $request->get('jabatan');
        $data['id_statkepegawaian'] = $request->get('statkepegawaian');

        DB::beginTransaction();
        try{
            if($id == ''){
                $data['created_at'] = Carbon::now();
                DB::table('dokter')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('dokter')->where(array('id' => $id))->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}
        //return redirect()->to('master/data-dokter');
        return response()->json($arr);
    }
    public function edit($id){
        $data = DB::table('dokter as d')
        ->join('spesialis as sp','d.id_spesialis','sp.id')
        ->join('jabatan as jb','d.id_jabatan','jb.id')
        ->join('statkepegawaian as sk','d.id_statkepegawaian','sk.id')
        ->select(DB::raw('
            d.*,
            sp.nama as spesialis,
            jb.nama as jabatan,
            sk.nama as statkepegawaian
        '))
        ->where('d.id',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        $data = DB::table('dokter')->delete($id);
        DB::commit();
        return response()->json($data);

    }
}
