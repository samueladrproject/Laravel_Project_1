<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DataAturan;
use App\Models\DataGejala;
use App\Models\DataPengguna;
use App\Models\DataPenyakit;
use App\Models\DataRiwayat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KonsultasiController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Konsultasi',
            'daftarGejala' => DataGejala::all()
        ];

        return view('frontend.pages.konsultasi', $datas);
    }

    public function hasilkonsultasi(Request $request)
    {
        $validateReq = $request->validate([
            'namapasien' => 'required',
            'alamatpasien' => 'required',
            'nohppasien' => 'required'
        ]);

        $services = $request->input('choiceRadio');

        if ($services == null) {
            return redirect('/konsultasi')->with('error', 'Anda Belum Mengisikan Data');
        } else {
            $dataPenyakit = DataPenyakit::all();
            $dataAturan = new DataAturan();

            foreach ($dataPenyakit as $penyakit) {
                $dataResult[$penyakit->nama_penyakit] = "";
                $fetchData[$penyakit->nama_penyakit] = $dataAturan
                    ->where('nama_penyakit', $penyakit->nama_penyakit)
                    ->select('nama_gejala')
                    ->get()
                    ->toArray();

                $daftarGejala[$penyakit->nama_penyakit] = [];
                foreach ($fetchData[$penyakit->nama_penyakit] as $dataGejala) {
                    array_push($daftarGejala[$penyakit->nama_penyakit], $dataGejala['nama_gejala']);
                }

                $resultProcess[$penyakit->nama_penyakit] = array_intersect($daftarGejala[$penyakit->nama_penyakit], $services);
            }

            // Menentukan Nilai CF
            foreach ($resultProcess as $key => $value) {
                if (count($resultProcess[$key]) > 0) {
                     foreach ($value as $a => $b) {
                    $fetchDataMB[$key][$a] = $dataAturan
                        ->where('nama_penyakit', $key)
                        ->where('nama_gejala', $b)
                        ->select('nilai_MB')
                        ->first();
                    $fetchDataMD[$key][$a] = $dataAturan
                        ->where('nama_penyakit', $key)
                        ->where('nama_gejala', $b)
                        ->select('nilai_MD')
                        ->first();
                    $dataHasilFetchMB[$key][$a] = $fetchDataMB[$key][$a]->nilai_MB;
                    $dataHasilFetchMD[$key][$a] = $fetchDataMB[$key][$a]->nilai_MD;
                    $dataHasilCF[$key][$a] = $dataHasilFetchMB[$key][$a] - $dataHasilFetchMD[$key][$a];
                }
                $fixIndexes[$key] = array_values($dataHasilCF[$key]);
                }
            }

            foreach ($fixIndexes as $kunci => $harga) {
                $hasilPerhitunganDataCF[$kunci] = round($this->persentaseCF($kunci, $harga), 3);
            }

            // Menyimpan Data Pengguna
            $savedDataPengguna = [
                'kode_user' => 'P' . date('YmdHis'),
                'nama_user' => $validateReq['namapasien'],
                'alamat_user' => $validateReq['alamatpasien'],
                'no_hp' => $validateReq['nohppasien']
            ];
            $dataPenggunaInsert = DataPengguna::insertGetId($savedDataPengguna);

            // Menyimpan Data Riwayat
            $dataFetchPenyakit = DataPenyakit::where('nama_penyakit',  array_search(max($hasilPerhitunganDataCF), $hasilPerhitunganDataCF))
                ->get()
                ->toArray();
            $jsonDiagnosa = [
                'NamaPenyakit' => array_search(max($hasilPerhitunganDataCF), $hasilPerhitunganDataCF),
                'Persentase' => max($hasilPerhitunganDataCF) * 100,
                'Probabilitas' => max($hasilPerhitunganDataCF)
            ];
            $savedDataRiwayat = [
                'id_user' => $dataPenggunaInsert,
                'tanggal' => Carbon::now(),
                'gejala' => json_encode($services),
                'diagnosa' => json_encode($jsonDiagnosa),
                'solusi' => $dataFetchPenyakit[0]['saran_penyakit']
            ];

            DataRiwayat::create($savedDataRiwayat);

            return redirect('/konsultasi' . '/' . Crypt::encryptString($savedDataPengguna['kode_user']))->with([
                'success' => 'Data Berhasil Disimpan!',
                'message' => 'Nomor Pasien anda adalah ',
                'kodepasien' => $savedDataPengguna['kode_user']
            ]);
        }
    }

    public function persentaseCF(String $NamaAttributes, $datArray, int $index = 0, $dataacuan = null)
    {
        $arrStartPoint = $datArray;

        if ($dataacuan == null) {
            $dataacuan = $arrStartPoint[$index];
        }

        if (!isset($arrStartPoint[$index + 1])) {
            $arrStartPoint[$index + 1] = 0;
        }

        $dataCF[$index] = $dataacuan + $arrStartPoint[$index + 1] * (1 - $dataacuan);

        if ($dataacuan == null) {
            unset($arrStartPoint[$index]);
            unset($arrStartPoint[$index + 1]);
        } else {
            unset($arrStartPoint[$index]);
        }

        if (count($arrStartPoint) > 1) {
            return $this->persentaseCF($NamaAttributes, $arrStartPoint, $index + 1, $dataCF[$index]);
        }

        if (count($arrStartPoint) > 1) {
            return $dataCF[$index];
        } else {
            return $dataCF[$index];
        }
    }

    public function prosesCari(Request $request)
    {
        $kode_pasien = Crypt::encryptString($request->get('kode_pasien'));
        return redirect('/konsultasi' . '/' . $kode_pasien);
    }

    public function tampilkanHasil($dataPasien)
    {
        $converterKodePasien = Crypt::decryptString($dataPasien);

        $dataPasien = DataPengguna::where('kode_user', $converterKodePasien);
        $fetchDataPasien = $dataPasien->get()->toArray()[0];

        $idUser = $fetchDataPasien['id_user'];
        $namaUser = $fetchDataPasien['nama_user'];
        $alamatUser = $fetchDataPasien['alamat_user'];
        $nohpUser = $fetchDataPasien['no_hp'];

        $dataRiwayat = DataRiwayat::where('id_user', $idUser);
        $fetchDataRiwayat = $dataRiwayat->get()->toArray()[0];

        $dataPenyakit = DataPenyakit::where('nama_penyakit', json_decode($fetchDataRiwayat['diagnosa'])->NamaPenyakit);
        $fetchDataPenyakit = $dataPenyakit->get()->toArray()[0];

        $datas = [
            'titlePage' => 'Hasil Konsultasi',
            'namaPasien' => $namaUser,
            'alamatPasien' => $alamatUser,
            'nohpPasien' => $nohpUser,
        ];
        $datas['hasilGejala'] = json_decode($fetchDataRiwayat['gejala']);
        $datas['namaPenyakit'] = json_decode($fetchDataRiwayat['diagnosa'])->NamaPenyakit;
        $datas['persentasePenyakit'] = json_decode($fetchDataRiwayat['diagnosa'])->Persentase;
        $datas['probabilitas'] = json_decode($fetchDataRiwayat['diagnosa'])->Probabilitas;
        $datas['detailPenyakit'] = $fetchDataPenyakit['detail_penyakit'];
        $datas['saranPenyakit'] = $fetchDataRiwayat['solusi'];

        return view('frontend.pages.hasilkonsul', $datas);
    }
}
