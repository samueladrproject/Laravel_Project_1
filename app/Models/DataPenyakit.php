<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenyakit extends Model
{
    protected $table = 'tabel_data_penyakit';
    protected $primaryKey = 'id_penyakit';
    protected $fillable = [
        'nama_penyakit',
        'detail_penyakit',
        'saran_penyakit'
    ];
}
