<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRiwayat extends Model
{
    protected $table = 'tabel_data_riwayat';
    protected $primaryKey = 'id_riwayat';
    protected $fillable = [
        'id_user',
        'tanggal',
        'gejala',
        'diagnosa',
        'solusi'
    ];
}
