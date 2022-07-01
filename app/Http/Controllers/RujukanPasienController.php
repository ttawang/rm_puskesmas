<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class RujukanPasienController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Rujukan Pasien';
        $data['dokter'] = DB::table('dokter')->get();
        $data['tindakan'] = DB::table('pemeriksaan')->get();
        $data['diagnosa'] = DB::table('diagnosa')->get();
        $data['obat'] = DB::table('obat')->get();
        $data['pemeriksaan'] = DB::table('pemeriksaan')->get();

        return view('tindakan.rujukan-pasien',$data);
    }

    public function get_data(Request $request)
    {
        $petugas = DB::table('users')->where('id',Auth::user()->sub_role);
        $data = DB::table('rujukan_pasien as rpp')
        ->join('tindakan_pasien as tp', 'rpp.id_tindakan','tp.id')
        ->join('registrasi_pasien as rp','rp.id','tp.id_registrasi')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->join('users as u','u.id','rpp.id_user_petugas')
        ->join('unit as un','un.id','u.sub_role')
        ->leftJoin('tindakan_pasien_rujukan as tpr','tp.id','tpr.id_tindakan_pasien')
        ->where('rpp.tipe_rujukan','internal')
        ->where('rpp.poli_tujuan',Auth::user()->sub_role)
        ->selectRaw('
            rpp.id,
            tp.id id_tindakan_pasien,
            rp.tgl_kunjungan tgl_reg,
            dp.nama nama_pasien,
            rpp.pemeriksaan,
            un.nama nama_poli,
            tpr.id id_tindakan_rujukan
        ')->get();
        // dd($data);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tgl_registrasi', function($row){
                $tanggal = Carbon::createFromFormat('Y-m-d', $row->tgl_reg)->format('d/m/Y');

                return $tanggal;
            })
            ->addColumn('anamnesis', function($row){
                $anamnesis = [];
                $temp = DB::table('tindakan_pasien_rujukan')->where('id_tindakan_pasien',$row->id_tindakan_pasien)->get();
                if($temp){
                    foreach($temp as $i){
                        $anamnesis[] = $i->anamnesis;
                    }
                }

                return join(', ',$anamnesis);
            })
            ->addColumn('action', function($row){
                $actionBtn = '';
                if($row->id_tindakan_rujukan){
                    $actionBtn .= '<button type="button" class="delete btn btn-primary btn-sm" id="btn_batal" data-id="'.$row->id_tindakan_rujukan.'">Batal</button>';
                }else{
                    $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit" data-id="'.$row->id.'">Tindak</button>';
                }


                return $actionBtn;
            })

            ->rawColumns(['action','tgl_registrasi','anamnesis'])
            ->make(true);
    }

    public function simpan(Request $request)
    {
        // dd($request->all());
        $data['anamnesis'] = $request->get('anamnesis');
        $data['jumlah_obat'] = join(',',$request->get('jumlah_obat'));
        $data['id_registrasi'] = $request->get('id_registrasi');
        $data['id_dokter'] = $request->get('dokter');
        $data['id_pemeriksaan'] = $request->get('tindakan');
        $data['id_diagnosa'] = $request->get('diagnosa');
        $data['id_obat'] = join(',',$request->get('obat'));
        // $data['id_aturan_pakai'] = join(',',$request->get('aturan_pakai'));
        $data['ket_obat'] = join(',',$request->get('ket_obat'));
        $data['id_tindakan_pasien'] = $request->get('id_tindakan_pasien');

        DB::beginTransaction();
        try{

            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            DB::table('tindakan_pasien_rujukan')->insert($data);
            $arr = ['status' => '1'];

            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}

        return response()->json($arr);
    }
    public function edit($id){
        $data = DB::table('rujukan_pasien as rpp')
        ->join('tindakan_pasien as tp', 'rpp.id_tindakan','tp.id')
        ->join('registrasi_pasien as rp','tp.id_registrasi','rp.id')
        ->join('unit as u','rpp.poli_tujuan','u.id')
        ->join('data_pasien as dp','rp.id_pasien','dp.id')
        ->select(DB::raw('
            rpp.id id_rujukan_pasien,
            tp.id id_tindakan_pasien,
            rp.tgl_kunjungan as tgl_kunjungan,
            dp.nama as nama_pasien,
            dp.kode_pasien as no_redis,
            u.nama as nama_unit,
            rp.id id_registrasi
        '))
        ->where('rpp.id',$id)
        ->first();


        return response()->json($data);
    }
    public function hapus($id){
        $data = DB::table('tindakan_pasien_rujukan')->delete($id);
        return response()->json($data);
    }
}
