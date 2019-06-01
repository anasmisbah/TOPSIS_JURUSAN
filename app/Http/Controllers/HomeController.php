<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Alternatif;
use App\Kriteria;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jmlsiswa = Siswa::count();
        $jmlkriteria = Kriteria::count();
        $jmlalternatif = Alternatif::count();
        return view('home',['jmlsiswa'=>$jmlsiswa,'jmlkriteria'=>$jmlkriteria,'jmlalternatif'=>$jmlalternatif]);
    }
}
