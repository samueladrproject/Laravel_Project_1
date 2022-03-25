<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DataPenyakit;
use Illuminate\Http\Request;

class DataPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Penyakit',
            'namaPage' => 'Data Penyakit',
            'iconPage' => 'fas fa-bug',
            'dataPenyakit' => DataPenyakit::all()
        ];

        return view('backend.pages.datapenyakit.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Penyakit',
            'namaPage' => 'Data Penyakit',
            'iconPage' => 'fas fa-bug'
        ];

        return view('backend.pages.datapenyakit.create', $datas);
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
            'detailpenyakit' => 'required',
            'saranpenyakit' => 'required',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
        ];

        $validateReq = $this->validate($request, $rules, $customMessages);

        $savedData = [
            'nama_penyakit' => $validateReq['namapenyakit'],
            'detail_penyakit' => $validateReq['detailpenyakit'],
            'saran_penyakit' => $validateReq['saranpenyakit'],
        ];

        DataPenyakit::create($savedData);

        return redirect('/data-penyakit')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPenyakit $dataPenyakit)
    {
        $id = $dataPenyakit->id_penyakit;

        $datas = [
            'titlePage' => 'Data Penyakit',
            'namaPage' => 'Data Penyakit',
            'iconPage' => 'fas fa-bug',
            'dataPenyakit' => DataPenyakit::find($id)
        ];

        return view('backend.pages.datapenyakit.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPenyakit $dataPenyakit)
    {
        $id = $dataPenyakit->id_penyakit;

        $rules = [
            'namapenyakit' => 'required',
            'detailpenyakit' => 'required',
            'saranpenyakit' => 'required',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
        ];

        $validateReq = $this->validate($request, $rules, $customMessages);

        $savedData = [
            'nama_penyakit' => $validateReq['namapenyakit'],
            'detail_penyakit' => $validateReq['detailpenyakit'],
            'saran_penyakit' => $validateReq['saranpenyakit'],
        ];

        $dataPenyakit = DataPenyakit::find($id);

        $dataPenyakit->nama_penyakit = $savedData['nama_penyakit'];
        $dataPenyakit->detail_penyakit = $savedData['detail_penyakit'];
        $dataPenyakit->saran_penyakit = $savedData['saran_penyakit'];

        $dataPenyakit->save();

        return redirect('/data-penyakit')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPenyakit  $dataPenyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPenyakit $dataPenyakit)
    {
        $id = $dataPenyakit->id_penyakit;

        $dataPenyakit = DataPenyakit::findOrFail($id);

        $dataPenyakit->delete();

        return redirect('/data-penyakit')->with('success', 'Data Berhasil Dihapus!');
    }
}
