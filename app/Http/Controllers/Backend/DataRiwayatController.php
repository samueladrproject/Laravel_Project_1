<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataPengguna;
use App\Models\DataRiwayat;
use Illuminate\Http\Request;

class DataRiwayatController extends Controller
{
    public function index()
    {
        $outputData = [];

        $dataPengguna = DataPengguna::all();

        $i = 0;
        foreach ($dataPengguna as $pengguna) {
            $outputData[$i]['kode_user'] = $pengguna->kode_user;
            $outputData[$i]['nama_user'] = $pengguna->nama_user;
            $outputData[$i]['alamat_user'] = $pengguna->alamat_user;
            $outputData[$i]['no_hp'] = $pengguna->no_hp;

            $dataRiwayat[$i] = DataRiwayat::where('id_user', $pengguna->id_user);
            $fetchDataRiwayat[$i] = $dataRiwayat[$i]->get()->toArray();

            $outputData[$i]['tanggal_periksa'] = $fetchDataRiwayat[$i][0]['tanggal'];
            $outputData[$i]['nama_penyakit'] = json_decode($fetchDataRiwayat[$i][0]['diagnosa'])->NamaPenyakit;
            $outputData[$i]['probabilitas'] = json_decode($fetchDataRiwayat[$i][0]['diagnosa'])->Probabilitas;
            $i++;
        }


        $datas = [
            'titlePage' => 'Data Riwayat',
            'namaPage' => 'Data Riwayat',
            'iconPage' => 'fas fa-clock',
            'tabelRiwayat' => $outputData
        ];

        return view('backend.pages.datariwayat', $datas);
    }

    public function hapus(Request $request)
    {
        $dataPengguna = DataPengguna::where('kode_user', $request->get('kode_user'))->get()->toArray()[0];

        DataRiwayat::where('id_user', $dataPengguna['id_user'])->delete();
        DataPengguna::where('kode_user', $request->get('kode_user'))->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }

    public function apiGetData()
    {
        $fetchDataRiwayat = DataRiwayat::all();

        $resultAllData = [];

        foreach ($fetchDataRiwayat as $riwayat) {
            array_push($resultAllData, json_decode($riwayat->diagnosa)->NamaPenyakit);
        }

        $data = [
            'x' => array_count_values($resultAllData)['Abses Gingiva'],
            'y' => isset(array_count_values($resultAllData)['Abses Periapikal']) ? array_count_values($resultAllData)['Abses Periapikal'] : 0
        ];

        return $data;
    }
}
