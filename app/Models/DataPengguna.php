<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengguna extends Model
{
    protected $table = 'tabel_data_pengguna';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'kode_user',
        'nama_user',
        'alamat_user',
        'no_hp'
    ];
}
