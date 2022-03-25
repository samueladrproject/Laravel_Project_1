<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataAturan extends Model
{
    protected $table = 'tabel_data_aturan';
    protected $primaryKey = 'id_aturan';
    protected $fillable = [
        'nama_penyakit',
        'nama_gejala',
        'nilai_MB',
        'nilai_MD'
    ];
}
