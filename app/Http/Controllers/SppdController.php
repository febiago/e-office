<?php

namespace App\Http\Controllers;
use App\Models\Sppd;
use App\Models\Surat_keluar;
use App\Models\Pegawai;
use App\Models\Jenis_sppd;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class SppdController extends Controller
{
    public function index()
    {
        $sppds = Sppd::with(['pegawai', 'surat_keluar', 'jenis_sppd'])->get();
        $data = ['type_menu' => 'sppd'];

        //return view with data
        return view('admin.sppd',$data, compact('sppds'));
    }

    public function create()
    {
        $data = ['type_menu' => 'sppd'];
        $sppds = Surat_keluar::where('no_surat', 'like', '%090%')
                ->whereNotIn('id', function($query) {
                    $query->select('surat_keluar_id')
                          ->from('sppds');
                })
                ->pluck('no_surat', 'id');
        
        $pegawais = Pegawai::pluck('nama', 'id');
        $jenis = Jenis_sppd::pluck('nama', 'id');
        $kegiatans = Kegiatan::pluck('sub_kegiatan', 'id');

        return view('admin.sppd.create', $data, compact('sppds','pegawais','jenis','kegiatans'));
    }

    public function getSisaAnggaran($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $sisa_anggaran = $kegiatan->getSisaAnggaran();
        return response()->json(['sisa_anggaran' => $sisa_anggaran]);
    }

    public function checkUnique(Request $request)
    {
        $messages = [
            'pegawai_id.*.unique' => 'Perjalanan Dinas Ganda',
        ];

        $pegawai_ids = $request->input('pegawai_id');

        foreach ($pegawai_ids as $key => $value) {
            $rules['pegawai_id.' . $key] = [
                'nullable',
                Rule::unique('sppds', 'pegawai_id')->where(function ($query) use ($request, $key) {
                    $query->where('tgl_berangkat', $request->input('tgl_berangkat'))
                          ->where('pegawai_id', $request->input('pegawai_id')[$key]);
                }),
            ];
        }
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        $messages = [
            'pegawai_id.unique' => 'Perjalanan Dinas Ganda',
        ];

        $validator = Validator::make($request->all(), [
          'surat_keluar_id'=> 'required',
          'pegawai_id'       => [
                                  'required',
                                  Rule::unique('sppds')->where(function ($query) use ($request) {
                                      return $query->where('tgl_berangkat', $request->tgl_berangkat);
                                  })
                              ],
          'jenis'         => 'required',
          'kegiatan'      => 'required',
          'tgl_berangkat' => 'required|date',
          'tgl_kembali'   => 'required|date',
          'kendaraan'     => 'required',
          'tujuan'        => 'required',
          'keterangan'    => 'nullable',
              ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $surat_keluar_id= $request->surat_keluar_id;
        $pegawai_id     = $request->pegawai_id;
        $jenis          = $request->jenis;
        $kegiatan       = $request->kegiatan;
        $tgl_berangkat  = $request->tgl_berangkat;
        $tgl_kembali    = $request->tgl_kembali;
        $kendaraan      = $request->kendaraan;
        $tujuan         = $request->tujuan;
        $keterangan     = $request->filled('keterangan') ? $request->keterangan : '-';

        // Create Perjalanan Dinas
        $sppd = Sppd::create([
            'surat_keluar_id' => $surat_keluar_id,
            'pegawai_id'      => $pegawai_id,
            'jenis_id'        => $jenis,
            'kegiatan_id'     => $kegiatan,
            'jenis'           => 'inti',
            'kendaraan'       => $kendaraan,
            'tgl_berangkat'   => $tgl_berangkat,
            'tgl_kembali'     => $tgl_kembali,
            'tujuan'          => $tujuan,
            'keterangan'      => $keterangan
        ]);

        $nama = $request->pengikut;
        if (!empty($nama)) {
        foreach ($nama as $pengikut) {
        $data = Sppd::create([
            'surat_keluar_id' => $surat_keluar_id,
            'pegawai_id'      => $pengikut,
            'jenis_id'        => $jenis,
            'kegiatan_id'     => $kegiatan,
            'jenis'           => 'pengikut',
            'kendaraan'       => $kendaraan,
            'tgl_berangkat'   => $tgl_berangkat,
            'tgl_kembali'     => $tgl_kembali,
            'tujuan'          => $tujuan,
            'keterangan'      => $keterangan
            ]);
          }
        }

        return redirect()->route('sppd.index')->with('success', 'Perjalanan Dinas berhasil ditambahkan!');
    }

}
