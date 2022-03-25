<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataGejala;
use Illuminate\Http\Request;

class DataGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Gejala',
            'namaPage' => 'Data Gejala',
            'iconPage' => 'fas fa-vial',
            'dataGejala' => DataGejala::all()
        ];

        return view('backend.pages.datagejala.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Gejala',
            'namaPage' => 'Data Gejala',
            'iconPage' => 'fas fa-vial',
        ];

        return view('backend.pages.datagejala.create', $datas);
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
            'namagejala' => 'required'
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
        ];

        $validateReq = $this->validate($request, $rules, $customMessages);

        $savedData = [
            'nama_gejala' => $validateReq['namagejala']
        ];

        DataGejala::create($savedData);

        return redirect('/data-gejala')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(DataGejala $dataGejala)
    {
        $datas = [
            'titlePage' => 'Data Gejala',
            'namaPage' => 'Data Gejala',
            'iconPage' => 'fas fa-vial',
            'dataGejala' => $dataGejala
        ];

        return view('backend.pages.datagejala.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataGejala $dataGejala)
    {
        $rules = [
            'namagejala' => 'required'
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
        ];

        $validateReq = $this->validate($request, $rules, $customMessages);

        $savedData = [
            'nama_gejala' => $validateReq['namagejala']
        ];

        $dataGejala->nama_gejala = $savedData['nama_gejala'];

        $dataGejala->save();

        return redirect('/data-gejala')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataGejala $dataGejala)
    {
        $dataGejala->delete();
        return redirect('/data-gejala')->with('success', 'Data Berhasil Dihapus!');
    }
}
