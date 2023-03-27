<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    public function index()
    {
        $smasuk = Disposisi::latest()->get();
        $data = ['type_menu' => 'diposisi'];

        //return view with data
        return view('admin.disposisi',$data, compact('disposisi'));
    }
}
