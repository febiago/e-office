<?php

namespace App\Http\Controllers;
use App\Models\Sppd;
use App\Models\Surat_keluar;
use App\Models\Pegawai;
use App\Models\Jenis_sppd;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exports\SppdExport;
use Maatwebsite\Excel\Facades\Excel;
use Terbilang;

class SppdController extends Controller
{
    public function index()
    {
        $sppds = Sppd::with(['pegawai', 'surat_keluar', 'jenis_sppd'])
                        ->orderBy('tgl_berangkat', 'desc')
                        ->orderBy('id', 'asc')
                        ->get();

        $data = ['type_menu' => 'sppd'];

        //return view with data
        return view('admin.sppd',$data, compact('sppds'));
    }

    public function create()
    {
        $data = ['type_menu' => 'sppd'];
        $sppds = Surat_keluar::where(function ($query) {
                    $query->where('no_surat', 'like', '%000.1.2%')
                          ->orWhere('no_surat', 'like', '%090%');
                })
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

    public function getKendaraan(Request $request)
    {
        $pegawai = Pegawai::findOrFail($request->id);
        return $pegawai->kendaraan;
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
            'pegawai.unique' => 'Perjalanan Dinas Ganda',
        ];

        $validator = Validator::make($request->all(), [
          'surat_keluar_id'=> 'required',
          'pegawai'       => ['required',
                                  Rule::unique('sppds', 'pegawai_id')->where(function ($query) use ($request) {
                                      return $query->where('tgl_berangkat', $request->tgl_berangkat);
                                  })
                              ],
          'jenis'         => 'required',
          'kegiatan'      => 'required',
          'tgl_berangkat' => 'required|date',
          'tgl_kembali'   => 'required|date',
          'kendaraan'     => 'required',
          'tujuan'        => 'required',
          'dasar'         => 'nullable',
          'keterangan'    => 'nullable',
                            ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $surat_keluar_id= $request->surat_keluar_id;
        $pegawai_id     = $request->pegawai;
        $jenis          = $request->jenis;
        $kegiatan       = $request->kegiatan;
        $tgl_berangkat  = $request->tgl_berangkat;
        $tgl_kembali    = $request->tgl_kembali;
        $kendaraan      = $request->kendaraan;
        $tujuan         = $request->tujuan;
        $dasar          = $request->filled('dasar') ? $request->dasar : '-';
        $keterangan     = $request->filled('keterangan') ? $request->keterangan : '-';

        // Create Perjalanan Dinas
        $sppd = Sppd::create([
            'surat_keluar_id' => $surat_keluar_id,
            'pegawai_id'      => $pegawai_id,
            'jenis_sppd_id'   => $jenis,
            'kegiatan_id'     => $kegiatan,
            'jenis'           => 'inti',
            'kendaraan'       => $kendaraan,
            'tgl_berangkat'   => $tgl_berangkat,
            'tgl_kembali'     => $tgl_kembali,
            'tujuan'          => $tujuan,
            'dasar'           => $dasar,
            'keterangan'      => $keterangan
        ]);

        $nama = $request->pegawai_id;
        $angkutan = $request->angkutan;

        if (!empty($nama)) {
        foreach ($nama as $key => $pengikut) {
        $data = Sppd::create([
            'surat_keluar_id' => $surat_keluar_id,
            'pegawai_id'      => $pengikut,
            'jenis_sppd_id'   => $jenis,
            'kegiatan_id'     => $kegiatan,
            'jenis'           => 'pengikut',
            'kendaraan'       => $angkutan[$key],
            'tgl_berangkat'   => $tgl_berangkat,
            'tgl_kembali'     => $tgl_kembali,
            'tujuan'          => $tujuan,
            'dasar'           => $dasar,
            'keterangan'      => $keterangan
            ]);
          }
        }

        return redirect('/sppd')->with('success', 'Perjalanan Dinas berhasil ditambahkan!');
    }

    public function show($id)
    {
        $sppd = Sppd::findOrFail($id);
        return view('admin.sppd.show', compact('sppd'));
    }

    public function edit($id)
    {
        $data = ['type_menu' => 'sppd'];
        $sppd = Sppd::where('surat_keluar_id', $id)->firstOrFail();
        $sppds = Surat_keluar::pluck('no_surat', 'id');
        $pegawais = Pegawai::pluck('nama', 'id');
        $jenis = Jenis_sppd::pluck('nama', 'id');
        $kegiatans = Kegiatan::pluck('sub_kegiatan', 'id');

        // Ambil semua pegawai inti dan hanya pegawai pengikut terkait dengan surat keluar ini
        $pegawaiInti = $sppd->pegawai;
        $pegawaiPengikut = Sppd::where('surat_keluar_id', $id)
                        ->where('jenis', 'pengikut')
                        ->get(); 

        return view('admin.sppd.edit', $data, compact('sppds', 'pegawais', 'jenis', 'kegiatans', 'sppd', 'pegawaiInti', 'pegawaiPengikut'));
    }


    public function update(Request $request, $id)
    {
        $messages = [
            'pegawai.unique' => 'Perjalanan Dinas Ganda',
        ];

        $validator = Validator::make($request->all(), [
            'surat_keluar_id' => 'required',
            'jenis' => 'required',
            'kegiatan' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date',
            'kendaraan' => 'required',
            'tujuan' => 'required',
            'dasar' => 'nullable',
            'keterangan' => 'nullable',
            'pegawai_id.*' => [
                'required',
                Rule::unique('sppds', 'pegawai_id')->where(function ($query) use ($request) {
                    return $query->whereDate('tgl_berangkat', $request->tgl_berangkat)
                                 ->whereNotIn('pegawai_id', $request->pegawai_id);
                }),
            ],
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sppd = Sppd::where('surat_keluar_id', $id)->firstOrFail();
        $sppd->pegawai_id = $request->pegawai;
        $sppd->jenis_sppd_id = $request->jenis;
        $sppd->kegiatan_id = $request->kegiatan;
        $sppd->tgl_berangkat = $request->tgl_berangkat;
        $sppd->tgl_kembali = $request->tgl_kembali;
        $sppd->kendaraan = $request->kendaraan;
        $sppd->tujuan = $request->tujuan;
        $sppd->dasar = $request->filled('dasar') ? $request->dasar : '-';
        $sppd->keterangan = $request->filled('keterangan') ? $request->keterangan : '-';
        $sppd->save();


        // Update pengikut
        $nama = $request->pegawai_id;
        $angkutan = $request->angkutan;

        // Check if $nama is not null and is an array
        if (!empty($nama)) {
            foreach ($nama as $key => $pengikut) {
                // Cek apakah entitas sudah ada berdasarkan ID pengikut
                $existingSppd = Sppd::where('surat_keluar_id', $id)
                                    ->where('jenis', 'pengikut')
                                    ->where('pegawai_id', $pengikut)
                                    ->first();

                if ($existingSppd) {
                    // Jika entitas sudah ada, lakukan pembaruan (update)
                    $existingSppd->update([
                        'jenis_sppd_id' => $request->jenis,
                        'kegiatan_id' => $request->kegiatan,
                        'kendaraan' => $angkutan[$key],
                        'tgl_berangkat' => $request->tgl_berangkat,
                        'tgl_kembali' => $request->tgl_kembali,
                        'tujuan' => $request->tujuan,
                        'dasar' => $request->filled('dasar') ? $request->dasar : '-',
                        'keterangan' => $request->filled('keterangan') ? $request->keterangan : '-',
                    ]);
                } else {
                    // Jika entitas belum ada, buat entitas baru
                    $sppd_pengikut = Sppd::create([
                        'surat_keluar_id' => $id,
                        'jenis' => 'pengikut',
                        'pegawai_id' => $pengikut,
                        'jenis_sppd_id' => $request->jenis,
                        'kegiatan_id' => $request->kegiatan,
                        'kendaraan' => $angkutan[$key],
                        'tgl_berangkat' => $request->tgl_berangkat,
                        'tgl_kembali' => $request->tgl_kembali,
                        'tujuan' => $request->tujuan,
                        'dasar' => $request->filled('dasar') ? $request->dasar : '-',
                        'keterangan' => $request->filled('keterangan') ? $request->keterangan : '-',
                    ]);
                }
            }
        }
        return redirect()->back()->with('success', 'Perjalanan Dinas berhasil diperbarui!');
    }

    public function delete($id)
    {
        //delete post by ID
        Sppd::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }

    public function destroy($id)
    {
        //delete post by ID
        Sppd::where('surat_keluar_id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }

    public function printPDF($id)
    {
        $data = Sppd::find($id);
        $no_surat = $data->surat_keluar_id;
        $sppd = Sppd::with(['pegawai', 'surat_keluar', 'jenis_sppd'])
                 ->where('surat_keluar_id', $no_surat)
                 ->get();
        $keluar = Surat_keluar::where('id', $no_surat)
                 ->first();
        $pengikut = Sppd::with(['pegawai', 'surat_keluar', 'jenis_sppd'])
                 ->where('surat_keluar_id', $no_surat)
                 ->where('jenis', 'pengikut')
                 ->get();
        $jenis = Jenis_sppd::where('id', $data->jenis_sppd_id)->first();
        $jumlah = count($sppd)*$jenis->biaya;
        $terbilangku = Terbilang::make($jumlah);

        $camat = Pegawai::where('jabatan', 'Camat Punung')->first();
        $tgl_berangkat = Carbon::parse($data->tgl_berangkat)->isoFormat(('DD MMMM Y'));
        $waktu = Carbon::parse($data->tgl_berangkat)->isoFormat(('dddd, DD MMMM Y'));
        $tgl_kembali = Carbon::parse($data->tgl_kembali)->isoFormat(('DD MMMM Y'));
        $tgl_spt = Carbon::parse($keluar->tgl_surat)->isoFormat(('DD MMMM Y'));


        $carbonTglBerangkat = Carbon::createFromFormat('Y-m-d', $data->tgl_berangkat);
        $carbonTglKembali = Carbon::createFromFormat('Y-m-d', $data->tgl_kembali);
        $hari = $carbonTglKembali->diffInDays($carbonTglBerangkat);

        $pdf = PDF::loadView('pdf.sppd', [
            'data' => $sppd, 
            'tgl_berangkat' => $tgl_berangkat, 
            'tgl_kembali' => $tgl_kembali,
            'tgl_spt' => $tgl_spt,
            'camat' => $camat,
            'hari' => $hari,
            'pengikut' => $pengikut,
            'jumlah' => $jumlah,
            'waktu' => $waktu

        ]);

        return $pdf->stream('sppd.pdf');
    }

    public function exportXls()
    {
        return Excel::download(new SppdExport, 'laporan-sppd.xlsx');
    }

    public function previewExport()
    {
        // Ambil data dengan relasi yang dibutuhkan
        $sppds = Sppd::with(['pegawai', 'surat_keluar', 'jenis_sppd', 'kegiatan'])->get();
        $data = ['type_menu' => 'rekap'];
    
        // Kirim data ke view
        return view('admin.sppd.preview', $data,compact('sppds'));
    }



}
