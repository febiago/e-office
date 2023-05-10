<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::latest()->get();
        $data = ['type_menu' => 'pegawai'];

        //return view with data
        return view('admin.pegawai',$data, compact('pegawais'));
    }
}
