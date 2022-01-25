<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TindakanPasienController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Tindakan Pasien';
        $data['dokter'] = DB::table('dokter')->get();
        $data['tindakan'] = DB::table('pemeriksaan')->get();
        $data['diagnosa'] = DB::table('diagnosa')->get();
        $data['obat'] = DB::table('obat')->get();

        $cek = DB::table('tindakan_pasien')->pluck('id_registrasi');


        $hariinihariyangkutunggubertambahsatutahunusiamu = Carbon::now()->toDateString();

        $data['no_registrasi'] = DB::table('registrasi_pasien')->where('tgl_kunjungan',$hariinihariyangkutunggubertambahsatutahunusiamu)->whereNotIn('id',$cek)->get();

        return view('tindakan.tindakan-pasien',$data);
    }

    public function get_data(Request $request)
    {

        $data = DB::table('tindakan_pasien as tp')
        ->join('registrasi_pasien as rp','tp.id_registrasi','rp.id')
        ->join('unit as u','rp.id_unit','u.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->join('obat as o','tp.id_obat','o.id')
        ->join('dokter as d','tp.id_dokter','d.id')
        ->join('diagnosa as di','tp.id_diagnosa','di.id')
        ->select(DB::raw('
            tp.id as id,
            tp.anamnesis as anamnesis,
            rp.no_registrasi as no_registrasi,
            rp.tgl_kunjungan as tgl_registrasi,
            u.nama as nama_poli,
            dp.nama as nama_pasien,
            o.nama as nama_obat,
            d.nama as nama_dokter,
            di.nama as nama_diagnosa
        '))
        ->orderBy('tp.id','desc')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tgl_registrasi', function($row){
                $tanggal = Carbon::createFromFormat('Y-m-d', $row->tgl_registrasi)->format('d/m/Y');

                return $tanggal;
            })
            ->addColumn('action', function($row){
                //$actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm ">Delete</a>';
                $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_edit" data-id="'.$row->id.'">Edit</button>';
                return $actionBtn;
            })
            ->rawColumns(['action','tgl_registrasi'])
            ->make(true);
    }
    public function simpan(Request $request)
    {
        $id = $request->get('id');
        $data['anamnesis'] = $request->get('anamnesis');
        $data['id_pemeriksaan'] = $request->get('tindakan');
        $data['id_diagnosa'] = $request->get('diagnosa');
        $data['id_obat'] = $request->get('obat');
        $data['id_dokter'] = $request->get('dokter');

        DB::beginTransaction();
        try{
            if($id == ''){
                $data['id_registrasi'] = $request->get('no_registrasi_tambah');
                $data['created_at'] = Carbon::now();
                DB::table('tindakan_pasien')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['id_registrasi'] = $request->get('no_registrasi_edit');
                $data['updated_at'] = Carbon::now();
                DB::table('tindakan_pasien')->where(array('id' => $id))->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}

        return response()->json($arr);
    }
    public function get_data_pasien($id){
        $data = DB::table('registrasi_pasien as rp')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->join('unit as u','rp.id_unit','u.id')
        ->select(DB::raw('
            rp.id as id,
            rp.tgl_kunjungan as tgl_kunjungan,
            dp.nama as nama_pasien,
            dp.kode_pasien as no_redis,
            u.nama as nama_unit
        '))
        ->where('rp.id',$id)->first();

        return response()->json($data);
    }
    public function edit($id){
        $data = DB::table('tindakan_pasien as tp')
        ->join('registrasi_pasien as rp','tp.id_registrasi','rp.id')
        ->join('unit as u','rp.id_unit','u.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->join('obat as o','tp.id_obat','o.id')
        ->join('dokter as d','tp.id_dokter','d.id')
        ->join('diagnosa as di','tp.id_diagnosa','di.id')
        ->select(DB::raw('
            tp.*,
            rp.tgl_kunjungan as tgl_kunjungan,
            dp.nama as nama_pasien,
            dp.kode_pasien as no_redis,
            u.nama as nama_unit
        '))
        ->where('tp.id',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        $data = DB::table('tindakan_pasien')->delete($id);
        DB::commit();
        return response()->json($data);

    }
}
