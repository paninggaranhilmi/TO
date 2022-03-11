<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = "artikel";
    protected $fillable = ["user_id", "kategori_id", "judul_artikel", "isi_artikel", "gambar_artikel"];
}
