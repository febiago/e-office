<?php

namespace App\Http\Controllers;
use App\Models\Sppd;
use App\Models\Surat_keluar;
use App\Models\Pegawai;
use App\Models\Jenis_sppd;

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
        $sppds = Surat_keluar::where('no_surat', 'LIKE', '%090%')->pluck('no_surat', 'id');
        return view('admin.sppd.create', $data, compact('sppds'));
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'pengikut.*' => 'nullable|string|max:255'
      ]);

      // Create Perjalanan Dinas
      $perjalananDinas = new PerjalananDinas;
      $perjalananDinas->nama = $validatedData['nama'];
      $perjalananDinas->save();

      // Add Pengikut
      if ($request->has('pengikut')) {
        $pengikut = array_filter($validatedData['pengikut']);
        foreach ($pengikut as $nama) {
          $perjalananDinas->pengikut()->create(['nama' => $nama]);
        }
      }

      return redirect()->route('perjalanan_dinas.index')->with('success', 'Perjalanan Dinas berhasil ditambahkan!');
    }

}
