<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Tentang'
        ];

        return view('frontend.pages.tentang', $datas);
    }
}
