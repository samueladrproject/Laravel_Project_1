<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoPenyakitController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Informasi Penyakit'
        ];

        return view('frontend.pages.infopenyakit', $datas);
    }
}
