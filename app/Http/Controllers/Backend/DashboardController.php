<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataAturan;
use App\Models\DataGejala;
use App\Models\DataPengguna;
use App\Models\DataPenyakit;

class DashboardController extends Controller
{
    public function index()
    {

        $dataDashboard = [
            'totalPenyakit' => DataPenyakit::count(),
            'totalGejala' => DataGejala::count(),
            'totalAturan' => DataAturan::count(),
            'totalUser' => DataPengguna::count()
        ];

        $datas = [
            'titlePage' => 'Dashboard',
            'namaPage' => 'Dashboard',
            'iconPage' => 'fas fa-home',
            'dataDashboard' => $dataDashboard
        ];
        return view('backend.pages.dashboard', $datas);
    }
}
