<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

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

        $data['rujuk_internal_poli_tujuan'] = DB::table('unit')->where('id','!=',Auth::user()->sub_role)->get();
        $data['rujuk_internal_petugas'] = DB::table('users')->where('sub_role',Auth::user()->sub_role)->get();
        $data['pemeriksaan'] = DB::table('pemeriksaan')->get();
        // $data['aturanpakai'] = DB::table('aturan_pakai')->get();

        $cek = DB::table('tindakan_pasien')->pluck('id_registrasi');
        $hari = Carbon::now()->toDateString();

        $data['no_registrasi'] = DB::table('registrasi_pasien')->whereNotIn('id',$cek)->where('tgl_kunjungan',$hari)->where('id_unit',Auth::user()->sub_role)->orderBy('id','asc')->get();
        # $data['reg_lab'] = DB::table('registrasi_pasien')->whereIn('id',$cek)->where('tgl_kunjungan',$hari)->where('id_unit',Auth::user()->sub_role)->get();
        $data['reg_lab'] = DB::table('registrasi_pasien')->whereIn('id',$cek)->where('id_unit',Auth::user()->sub_role)->get();

        return view('tindakan.tindakan-pasien',$data);
    }

    public function get_data(Request $request)
    {
        $poli = Auth::user()->sub_role;
        $data = DB::table('tindakan_pasien as tp')
        ->leftjoin('registrasi_pasien as rp','tp.id_registrasi','rp.id')
        ->leftjoin('unit as u','rp.id_unit','u.id')
        ->leftjoin('data_pasien as dp','rp.id_pasien','dp.id')
        ->leftjoin('dokter as d','tp.id_dokter','d.id')
        ->leftjoin('diagnosa as di','tp.id_diagnosa','di.id')
        ->leftjoin('pemeriksaan as pr','tp.id_pemeriksaan','pr.id')
        // ->join('aturan_pakai as ap','tp.id_aturanpakai','ap.id')
        ->select(DB::raw('
            tp.id as id,
            tp.anamnesis as anamnesis,
            rp.no_registrasi as no_registrasi,
            rp.tgl_kunjungan as tgl_registrasi,
            rp.keluhan as keluhan,
            u.nama as nama_poli,
            dp.nama as nama_pasien,
            dp.kode_pasien as no_redis,
            d.nama as nama_dokter,
            di.nama as nama_diagnosa,
            pr.nama as nama_pemeriksaan
        '))
        ->where('u.id',$poli)
        ->orderBy('tp.id','desc')->get();
        // dd($data);
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tgl_registrasi', function($row){
                $tanggal = Carbon::createFromFormat('Y-m-d', $row->tgl_registrasi)->format('d/m/Y');

                return $tanggal;
            })
            ->addColumn('action', function($row){
                $cek = DB::table('rujukan_pasien')->where('id_tindakan',$row->id)->count();
                $temp = DB::table('rujukan_pasien')->where('id_tindakan',$row->id)->first();
                if($temp){
                    $tipe_rujukan = $temp->tipe_rujukan;
                }

                if($cek < 1){
                    $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_edit" data-id="'.$row->id.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Tindakan"><i class="fas fa-info-circle "></i></button>';
                    $actionBtn .= '<button type="button" class="edit btn btn-success btn-sm" id="btn_rujuk" data-id="'.$row->id.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Rujuk Pasien"><i class="fas fa-ambulance"></i></button>';
                    // $actionBtn .= '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus_rujuk" data-id="'.$row->id.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Batal Rujukan"><i class="fa fa-trash"></i></button>';
                }else{
                    $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_edit" data-id="'.$row->id.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Tindakan"><i class="fas fa-info-circle"></i></button>
                    <button type="button" class="edit btn btn-warning btn-sm" id="btn_edit_rujuk" data-id="'.$row->id.'" data-tipe="'.$tipe_rujukan.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Rujukan"><i class="fas fa-info-circle"></i></button>
                    <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus_rujuk" data-id="'.$row->id.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Batal Rujukan"><i class="fa fa-trash"></i></button>';
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
        $data['id_obat'] = join(',',$request->get('obat'));
        $data['jumlah_obat'] = join(',',$request->get('jumlah_obat'));
        $data['id_aturan_pakai'] = join(',',$request->get('aturan_pakai'));
        $data['ket_obat'] = join(',',$request->get('ket_obat'));
        $data['id_dokter'] = $request->get('dokter');
        // $data['id_aturan_pakai'] = $request->get('aturanpakai');

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
    public function hapusrujuk($id){
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
    public function rujuk_internal($id)
    {
        $data = DB::table('tindakan_pasien as tp')
        ->join('registrasi_pasien as rp','tp.id_registrasi','rp.id')
        ->join('unit as un','un.id','rp.id_unit')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->select(DB::raw('
            un.nama as poli_pengirim,
            dp.nama nama_pasien,
            dp.tgl_lahir,
            dp.jenis_kelamin,
            dp.alamat,
            tp.id id_tindakan
        '))
        ->where('tp.id',$id)
        ->first();

        return response()->json($data);
    }
    public function editrujuk($id,$tipe)
    {
        if($tipe == 'eksternal'){
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
        }elseif($tipe == 'internal'){
            $data = DB::table('tindakan_pasien as tp')
            ->join('registrasi_pasien as rp','tp.id_registrasi','rp.id')
            ->join('unit as un','un.id','rp.id_unit')
            ->join('data_pasien as dp','rp.id_pasien','dp.id')
            ->join('rujukan_pasien as rpe','rpe.id_tindakan','tp.id')
            ->select(DB::raw('
                un.nama as poli_pengirim,
                dp.nama nama_pasien,
                dp.tgl_lahir,
                dp.jenis_kelamin,
                dp.alamat,
                tp.id id_tindakan,
                rpe.pemeriksaan,
                rpe.id_user_petugas,
                rpe.poli_tujuan,
                rpe.id id_rujukan
            '))
            ->where('tp.id',$id)
            ->first();
        }

        return response()->json($data);
    }

    public function editrujukinternal($id)
    {
        $data = DB::table('tindakan_pasien as tp')
        ->join('registrasi_pasien as rp','tp.id_registrasi','rp.id')
        ->join('unit as un','un.id','rp.id_unit')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->select(DB::raw('
            un.nama as poli_pengirim,
            dp.nama nama_pasien,
            dp.tgl_lahir,
            dp.jenis_kelamin,
            dp.alamat,
            tp.id id_tindakan
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

        $data['tipe_rujukan'] = 'eksternal';
        $data['pemeriksaan'] = null;
        $data['id_user_petugas'] = null;

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
    public function simpanrujukinternal(Request $request)
    {
        // dd($request->all());
        $id = $request->get('rujuk_internal_id_rujukan');
        $data['id_tindakan'] = $request->get('rujuk_internal_id_tindakan');
        $data['tipe_rujukan'] = $request->get('rujuk_internal_tipe');
        $data['poli_tujuan'] = $request->get('rujuk_internal_poli_tujuan');
        $data['pemeriksaan'] = $request->get('rujuk_internal_pemeriksaan');
        $data['id_user_petugas'] = $request->get('rujuk_internal_petugas');

        $data['rs_tujuan'] = null;
        $data['kriteria'] = null;
        $data['no_rujuk'] = null;
        $data['alasan'] = null;

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

    public function hapus($id){
        $data = DB::table('tindakan_pasien')->delete($id);
        DB::commit();
        return response()->json($data);

    }

    public function get_data_lab(Request $request)
    {
        $data = DB::table('request_lab as rl')
        ->join('users as u','rl.id_user_petugas','u.id')
        ->join('registrasi_pasien as rp','rl.id_registrasi','rp.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->selectRaw('
            rl.id,
            dp.kode_pasien as no_rekammedis,
            dp.nama nama_pasien,
            rl.tgl_request,
            rl.keterangan,
            rl.id_pemeriksaan
        ')
        ->where('u.sub_role',Auth::user()->sub_role)
        ->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tgl_request', function($row){
                $tanggal = Carbon::createFromFormat('Y-m-d', $row->tgl_request)->format('d/m/Y');

                return $tanggal;
            })
            ->addColumn('pemeriksaan', function($row){
                if($row){
                    $_d = explode(",",$row->id_pemeriksaan);
                    $temp = [];
                    foreach($_d as $i){
                        $txt = DB::table('pemeriksaan')->where('id',$i)->first();
                        $temp[] = $txt->nama;
                    }
                    $hasil = join(', ', $temp);

                    return $hasil;
                }else{
                    $hasil = '';

                    return $hasil;
                }

            })
            ->addColumn('action', function($row){

                // $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit_req_lab" data-id="'.$row->id.'">Edit</button>';
                $actionBtn = '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus_req_lab" data-id="'.$row->id.'">Batalkan</button>';

                return $actionBtn;
            })
            ->rawColumns(['action','pemeriksaan','tgl_request'])
            ->make(true);
    }

    public function editlab($id)
    {
        $data = DB::table('request_lab as rl')
        ->join('users as u','rl.id_user_petugas','u.id')
        ->join('registrasi_pasien as rp','rl.id_registrasi','rp.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->selectRaw('
            rl.id,
            dp.kode_pasien as no_rekammedis,
            dp.nama nama_pasien,
            rl.tgl_request,
            rl.keterangan,
            rl.id_pemeriksaan
        ')
        ->where('rl.id',$id)
        ->first();

        return response()->json($data);
    }

    public function simpanlab(Request $request)
    {
        $id = $request->get('lab_id_request');
        $data['tgl_request'] = Carbon::createFromFormat('d/m/Y', $request->get('tgl_request'))->format('Y-m-d');
        $data['id_registrasi'] = $request->get('lab_no_regis');
        $data['id_pemeriksaan'] = join(',',$request->get('lab_pemeriksaan'));
        $data['id_dokter'] = $request->get('lab_dokter');
        $data['id_user_petugas'] = $request->get('lab_petugas');
        $data['keterangan'] = $request->get('keterangan');

        DB::beginTransaction();
        try{
            if($id == '' || $id == null){
                $data['created_at'] = Carbon::now();
                $data['updated_at'] = Carbon::now();
                DB::table('request_lab')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = Carbon::now();
                DB::table('request_lab')->where(array('id' => $id))->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}

        return response()->json($arr);

    }

    public function batallab($id){
        $data = DB::table('request_lab')->delete($id);
        DB::commit();
        return response()->json($data);

    }

}
