<?php

namespace App\Http\Controllers;
use App\Models\Surat_masuk;
use App\Models\Surat_keluar;
use App\Models\Sppd;

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
}
