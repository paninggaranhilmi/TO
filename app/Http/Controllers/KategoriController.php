<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all();
        return view('kategori', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Kategori::create([
            "nama_kategori" => $request->nama_kategori
        ]);

        return redirect()->route('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengambil data tarif yang idnya sesuai dengan parameter
        //first mengambil data pertama
        $data = Kategori::where('id',$id)->first();    
        if ($data) {
            return view('editkategori', ["data" => $data]);
        } else {
            return abort("404");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kategori::where('id',$id)->first();    
        if ($data) {
            //merubah data yang sudah didapatkan dari database menjadi data yang didapatkan dari input website
            $data->nama_kategori = $request->nama_kategori;
            //proses menyimpan/memperbarui data yang sudah ada di database
            $result = $data->save();
            //pengecekan jika berhasil terubah maka akan kembali ke halaman tarif

            if ($result) {
                return redirect()->route('kategori');
            } else {
                return abort("404");
            }
            
        } else {
            //untuk mengalihkan ke halaman not found
            return abort("404");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //mengambil data kategori yang idnya sesuai dengan parameter
        //first mengambil data pertama
        $data = Kategori::where('id',$id)->first();    
        if ($data) {
            if ($data->delete()) {
                return redirect()->route('kategori');
            } else {
                return abort("404");
            }
            return view('editkategori', ["data" => $data]);
        } else {
            return abort("404");
        }
    }
}
