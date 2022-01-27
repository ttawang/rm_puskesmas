<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class TindakanPasienController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Tindakan Pasien Puskesmas';
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
        ->join('pemeriksaan as pr','tp.id_pemeriksaan','pr.id')
        ->select(DB::raw('
            tp.id as id,
            tp.anamnesis as anamnesis,
            rp.no_registrasi as no_registrasi,
            rp.tgl_kunjungan as tgl_registrasi,
            rp.keluhan as keluhan,
            u.nama as nama_poli,
            dp.nama as nama_pasien,
            dp.kode_pasien as no_redis,
            o.nama as nama_obat,
            d.nama as nama_dokter,
            di.nama as nama_diagnosa,
            pr.nama as nama_pemeriksaan
        '))
        ->orderBy('tp.id','desc')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tgl_registrasi', function($row){
                $tanggal = Carbon::createFromFormat('Y-m-d', $row->tgl_registrasi)->format('d/m/Y');

                return $tanggal;
            })
            ->addColumn('action', function($row){
                $cek = DB::table('rujukan_pasien')->where('id_tindakan',$row->id)->count();
                if($cek < 1){
                    $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_edit" data-id="'.$row->id.'">Tindak</button>
                    <button type="button" class="edit btn btn-success btn-sm" id="btn_rujuk" data-id="'.$row->id.'">Rujuk</button>
                    <button type="button" class="edit btn btn-success btn-sm" id="btn_lab" data-id="'.$row->id.'">LAB</button>';
                }else{
                    $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_edit" data-id="'.$row->id.'">Tindak</button>
                    <button type="button" class="edit btn btn-warning btn-sm" id="btn_edit_rujuk" data-id="'.$row->id.'">Edit Rujukan</button>
                    <button type="button" class="edit btn btn-success btn-sm" id="btn_lab" data-id="'.$row->id.'">Edit LAB</button>';
                }

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
        ->join('pemeriksaan as pr','tp.id_pemeriksaan','pr.id')
        ->select(DB::raw('
            tp.*,
            rp.tgl_kunjungan as tgl_kunjungan,
            dp.nama as nama_pasien,
            dp.kode_pasien as no_redis,
            u.nama as nama_unit,
            pr.nama as nama_pemeriksaan
        '))
        ->where('tp.id',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        $data = DB::table('tindakan_pasien')->delete($id);
        DB::commit();
        return response()->json($data);

    }
    public function rujuk($id)
    {
        $data = DB::table('tindakan_pasien as tp')
        ->join('registrasi_pasien as rp','tp.id_registrasi','rp.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->join('diagnosa as d','tp.id_diagnosa','d.id')
        ->join('obat as o','tp.id_obat','o.id')
        ->join('kelompok_pasien as kp','dp.id_kelompok_pasien','kp.id')
        ->leftJoin('rujukan_pasien as rup','tp.id','rup.id_tindakan')
        ->select(DB::raw('
            tp.id id_tindakan,
            rp.id id_registrasi,
            dp.kode_pasien no_rekam_medis,
            rp.no_registrasi,
            dp.nama nama_pasien,
            dp.tgl_lahir,
            dp.jenis_kelamin,
            tp.anamnesis,
            d.nama nama_diagnosa,
            o.nama nama_obat,
            kp.nama kasta,
            rup.id id_rujukan
        '))
        ->where('tp.id',$id)
        ->first();

        return response()->json($data);
    }
    public function editrujuk($id)
    {
        $data = DB::table('tindakan_pasien as tp')
        ->join('registrasi_pasien as rp','tp.id_registrasi','rp.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->join('diagnosa as d','tp.id_diagnosa','d.id')
        ->join('obat as o','tp.id_obat','o.id')
        ->join('kelompok_pasien as kp','dp.id_kelompok_pasien','kp.id')
        ->leftJoin('rujukan_pasien as rup','tp.id','rup.id_tindakan')
        ->select(DB::raw('
            tp.id id_tindakan,
            rp.id id_registrasi,
            dp.kode_pasien no_rekam_medis,
            rp.no_registrasi,
            dp.nama nama_pasien,
            dp.tgl_lahir,
            dp.jenis_kelamin,
            tp.anamnesis,
            d.nama nama_diagnosa,
            o.nama nama_obat,
            kp.nama kasta,
            rup.id id_rujukan,
            rup.no_rujuk,
            rup.poli_tujuan,
            rup.rs_tujuan,
            rup.kriteria,
            rup.alasan
        '))
        ->where('tp.id',$id)
        ->first();

        return response()->json($data);
    }
    public function simpanrujuk(Request $request)
    {
        $id = $request->get('rujuk_id_rujukan');
        $data['id_tindakan'] = $request->get('rujuk_id_tindakan');
        $data['poli_tujuan'] = $request->get('rujuk_poli');
        $data['rs_tujuan'] = $request->get('rujuk_rumah_sakit');
        $data['kriteria'] = $request->get('rujuk_kriteria');
        $data['no_rujuk'] = $request->get('rujuk_no_rujukan');
        $data['alasan'] = $request->get('rujuk_alasan');

        DB::beginTransaction();
        try{
            if($id == '' || $id == null){
                $data['created_at'] = Carbon::now();
                $data['updated_at'] = Carbon::now();
                DB::table('rujukan_pasien')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('rujukan_pasien')->where(array('id' => $id))->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}

        return response()->json($arr);

    }
    public function lab($id)
    {
        $data = DB::table('tindakan_pasien as tp')
        ->join('registrasi_pasien as rp','tp.id_registrasi','rp.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->join('dokter as d','tp.id_dokter','d.id')
        ->join('unit as u','rp.id_unit','u.id')
        ->leftJoin('req_ceklab as rc','tp.id','rc.id_tindakan')
        ->select(DB::raw('
            tp.id id_tindakan,
            rp.no_registrasi,
            rp.tgl_kunjungan,
            dp.kode_pasien as no_rekam_medis,
            dp.nama as nama_pasien,
            dp.tgl_lahir,
            dp.jenis_kelamin,
            u.nama as nama_unit,
            d.nama as nama_dokter,
            rc.id as id_permintaan
        '))
        ->where('tp.id',$id)
        ->first();


        return response()->json($data);
    }

    public function editlab($id)
    {
        $data = DB::table('tindakan_pasien as tp')
        ->join('registrasi_pasien as rp','tp.id_registrasi','rp.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->join('dokter as d','tp.id_dokter','d.id')
        ->join('unit as u','rp.id_unit','u.id')
        ->leftJoin('req_ceklab as rc','tp.id','rc.id_tindakan')
        ->select(DB::raw('
            tp.id id_tindakan,
            rp.no_registrasi,
            rp.tgl_kunjungan,
            dp.kode_pasien as no_rekam_medis,
            dp.nama as nama_pasien,
            dp.tgl_lahir,
            dp.jenis_kelamin,
            u.nama as nama_unit,
            d.nama as nama_dokter,
            rc.id as id_permintaan,
            rc.keterangan
        '))
        ->where('tp.id',$id)
        ->first();


        return response()->json($data);
    }

    public function simpanlab(Request $request)
    {
        $id = $request->get('lab_id_permintaan');
        $data['id_tindakan'] = $request->get('lab_id_tindakan');
        $data['keterangan'] = $request->get('lab_keterangan');
        $data['pemeriksaan'] = $request->get('lab_pemeriksaan');
        $data['petugas'] = $request->get('petugas');

        DB::beginTransaction();
        try{
            if($id == '' || $id == null){
                $data['created_at'] = Carbon::now();
                $data['updated_at'] = Carbon::now();
                DB::table('req_ceklab')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('req_ceklab')->where(array('id' => $id))->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}

        return response()->json($arr);

    }
}
