<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Kategori::create([
            "nama_kategori" => "Sejarah", 
            
        ]);

        $data2 = Kategori::create([
            "nama_kategori" => "Sosial", 
            
        ]);

        $data3 = Kategori::create([
            "nama_kategori" => "Ekonomi", 
            
        ]);
    }
}
