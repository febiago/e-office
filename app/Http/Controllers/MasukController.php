<?php

namespace App\Http\Controllers;
use App\Models\Surat_masuk;
use App\Models\Disposisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasukController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts from Models
        $smasuk = Surat_masuk::latest()->get();
        $data = ['type_menu' => 'layout'];

        //return view with data
        return view('admin.masuk',$data, compact('smasuk'));
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'no_surat'      => 'required',
            'pengirim'      => 'required',
            'perihal'       => 'required',
            'tgl_surat'     => 'required',
            'tgl_diterima'  => 'required',
            'ditujukan'     => 'required',
            'kategori'      => 'nullable',
            'keterangan'    => 'nullable',
            'image'         => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());
        }

        //create post
        $masuk = Surat_masuk::create([
            'no_surat'      => $request->no_surat,
            'pengirim'      => $request->pengirim,
            'perihal'       => $request->perihal,
            'tgl_surat'     => $request->tgl_surat,
            'tgl_diterima'  => $request->tgl_diterima,
            'ditujukan'     => $request->ditujukan,
            'kategori'      => $request->kategori,
            'keterangan'    => $request->keterangan,
            'image'         => $image ? $image->hashName() : null
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $masuk  
        ]);
    }
}

