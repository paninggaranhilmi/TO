<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artikel;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Artikel::create([
            "user_id" => "Paninggaran", 
            "kategori_id" => "thiller",
            "judul_artikel" => "saya lagi sholat",
            "isi_artikel" => "asdasfasfc",
            "gambar_artikel" => ""

        ]);

        $data2 = Artikel::create([
            "user_id" => "Paninggaran", 
            "kategori_id" => "drama",
            "judul_artikel" => "saya lagi nyenter",
            "isi_artikel" => "asdasfasfc",
            "gambar_artikel" => "" 
            
        ]);

        $data3 = Artikel::create([
            "user_id" => "Paninggaran", 
            "kategori_id" => "comedy",
            "judul_artikel" => "saya lagi salto",
            "isi_artikel" => "asdasfasfc",
            "gambar_artikel" => "" 
            
        ]);
    }
}
