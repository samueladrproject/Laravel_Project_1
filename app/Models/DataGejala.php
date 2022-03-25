<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataGejala extends Model
{
    protected $table = 'tabel_gejala_penyakit';
    protected $primaryKey = 'id_gejala';
    protected $fillable = ['nama_gejala'];
}
