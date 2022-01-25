<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class ObatController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Obat Puskesmas';
        $data['golongan'] = DB::table('golongan_obat')->get();
        $data['satuan'] = DB::table('satuan_obat')->get();

        return view('master.data-obat',$data);
    }

    public function get_data(Request $request)
    {
            $data = DB::table('obat as ob')
            ->join('golongan_obat as gb','ob.id_golongan_obat','gb.id')
            ->join('satuan_obat as sb','ob.id_satuan_obat','sb.id')
            ->select(DB::raw('
                ob.id as id,
                ob.kode_obat as kode_obat,
                ob.nama as nama,
                ob.keterangan as keterangan,
                ob.id_golongan_obat as id_golongan_obat,
                ob.id_satuan_obat as satuan_obat,
                gb.nama as nama_golongan,
                sb.nama as nama_satuan
            '))
            ->orderBy('ob.id','desc')->get();
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
        $data['kode_obat'] = $request->get('kode_obat');
        $data['nama'] = $request->get('nama_obat');
        $data['keterangan'] = $request->get('keterangan');
        $data['id_golongan_obat'] = $request->get('golongan');
        $data['id_satuan_obat'] = $request->get('satuan');

        DB::beginTransaction();
        try{
            if($id == ''){
                $data['created_at'] = Carbon::now();
                DB::table('obat')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('obat')->where('id',$id)->update($data);
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
        $data = DB::table('obat as ob')
            ->join('golongan_obat as gb','ob.id_golongan_obat','gb.id')
            ->join('satuan_obat as sb', 'ob.id_satuan_obat', 'sb.id')
            ->select(DB::raw('
                ob.*,
                gb.nama as nama_golongan,
                sb.nama as nama_satuan
            '))
        ->where('ob.id',$id)->first();

        return response()->json($data);
    }

    public function hapus($id){
        $data = DB::table('obat')->delete($id);
        DB::commit();
        return response()->json($data);

    }
}
