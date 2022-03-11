<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::all();
        return view('artikel', ["data" => $data]);
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
        $data = Artikel::create([
            "user_id" => $request->user_id,
            "kategori_id" => $request->kategori_id,
            "judul_artikel" => $request->judul_artikel,
            "isi_artikel" => $request->isi_artikel,
            "gambar_artikel" => $request->gambar_artikel
        ]);

        return redirect()->route('artikel');
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
        $data = Artikel::where('id',$id)->first();    
        if ($data) {
            return view('editartikel', ["data" => $data]);
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
        $data = Artikel::where('id',$id)->first();    
        if ($data) {
            //merubah data yang sudah didapatkan dari database menjadi data yang didapatkan dari input website
            $data->user_id = $request->user_id;
            $data->kategori_id = $request->kategori_id;
            $data->judul_artikel = $request->judul_artikel;
            $data->isi_artikel = $request->isi_artikel;
            $data->gambar_artikel = $request->gambar_artikel;
            //proses menyimpan/memperbarui data yang sudah ada di database
            $result = $data->save();
            //pengecekan jika berhasil terubah maka akan kembali ke halaman tarif

            if ($result) {
                return redirect()->route('artikel');
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
        $data = Artikel::where('id',$id)->first();    
        if ($data) {
            if ($data->delete()) {
                return redirect()->route('artikel');
            } else {
                return abort("404");
            }
            return view('editartikel', ["data" => $data]);
        } else {
            return abort("404");
        }
    }
}
