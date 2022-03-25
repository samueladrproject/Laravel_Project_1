<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataAturan;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use Illuminate\Http\Request;

class DataAturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Aturan',
            'namaPage' => 'Data Aturan',
            'iconPage' => 'fas fa-recycle',
            'dataAturan' => DataAturan::all()
        ];

        return view('backend.pages.dataaturan.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Aturan',
            'namaPage' => 'Data Aturan',
            'iconPage' => 'fas fa-recycle',
            'dataPenyakit' => DataPenyakit::all(),
            'dataGejala' => DataGejala::all()
        ];

        return view('backend.pages.dataaturan.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'namapenyakit' => 'required',
            'namagejala' => 'required',
            'nilaimb' => 'required',
            'nilaimd' => 'required'
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
        ];

        $validateReq = $this->validate($request, $rules, $customMessages);

        $savedData = [
            'nama_penyakit' => $validateReq['namapenyakit'],
            'nama_gejala' => $validateReq['namagejala'],
            'nilai_MB' => $validateReq['nilaimb'],
            'nilai_MD' => $validateReq['nilaimd']
        ];

        DataAturan::create($savedData);

        return redirect('/data-aturan')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataAturan  $dataAturan
     * @return \Illuminate\Http\Response
     */
    public function edit(DataAturan $dataAturan)
    {
        $datas = [
            'titlePage' => 'Data Aturan',
            'namaPage' => 'Data Aturan',
            'iconPage' => 'fas fa-recycle',
            'dataAturan' => $dataAturan,
            'dataPenyakit' => DataPenyakit::all(),
            'dataGejala' => DataGejala::all()
        ];

        return view('backend.pages.dataaturan.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataAturan  $dataAturan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataAturan $dataAturan)
    {
        $rules = [
            'namapenyakit' => 'required',
            'namagejala' => 'required',
            'nilaimb' => 'required',
            'nilaimd' => 'required'
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
        ];

        $validateReq = $this->validate($request, $rules, $customMessages);

        $savedData = [
            'nama_penyakit' => $validateReq['namapenyakit'],
            'nama_gejala' => $validateReq['namagejala'],
            'nilai_MB' => $validateReq['nilaimb'],
            'nilai_MD' => $validateReq['nilaimd']
        ];

        $dataAturan->nama_penyakit = $savedData['nama_penyakit'];
        $dataAturan->nama_gejala = $savedData['nama_gejala'];
        $dataAturan->nilai_MB = $savedData['nilai_MB'];
        $dataAturan->nilai_MD = $savedData['nilai_MD'];

        $dataAturan->save();

        return redirect('/data-aturan')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataAturan  $dataAturan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataAturan $dataAturan)
    {
        $dataAturan->delete();
        return redirect('/data-aturan')->with('success', 'Data Berhasil Dihapus!');
    }
}
