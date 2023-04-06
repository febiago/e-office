<?php

namespace App\Http\Controllers;
use App\Models\Surat_masuk;
use App\Models\Surat_keluar;
use App\Models\Sppd;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Jenssegers\Date\Date;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $smasuk = Surat_masuk::count();
        $skeluar = Surat_keluar::count();
        $sppd = Sppd::count();
        $data = ['type_menu' => 'dashboard'];

        //return view with data
        return view('admin.dashboard',$data, compact('smasuk', 'skeluar', 'sppd'));
    }

    public function chart()
    {
        $data = DB::table('surat_keluars')
                ->select('tgl_surat', DB::raw('COUNT(*) as count'))
                ->whereNotIn(DB::raw('DAYNAME(tgl_surat)'), ['Saturday', 'Sunday'])
                ->orderBy('tgl_surat', 'desc')
                ->limit(5)
                ->groupBy('tgl_surat')
                ->orderBy('tgl_surat', 'asc')
                ->get()
                ->map(function ($item) {
                    return [    
                      'day' => Date::parse($item->tgl_surat)->locale('id')->format('l'),
                      'count' => $item->count
                    ];
                });

        return response()->json($data);
    }

        public function chartM()
    {
        $data = DB::table('surat_masuks')
                ->select('tgl_diterima', DB::raw('COUNT(*) as count'))
                ->whereNotIn(DB::raw('DAYNAME(tgl_diterima)'), ['Saturday', 'Sunday'])
                ->orderBy('tgl_diterima', 'desc')
                ->limit(5)
                ->groupBy('tgl_diterima')
                ->orderBy('tgl_diterima', 'asc')
                ->get()
                ->map(function ($item) {
                    return [    
                      'day' => Date::parse($item->tgl_diterima)->locale('id')->format('l'),
                      'count' => $item->count
                    ];
                });

        return response()->json($data);
    }

}
