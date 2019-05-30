<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kriteria;
use App\Alternatif;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index',compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();
        return view('siswa.create',['kriterias'=>$kriterias,'alternatifs'=>$alternatifs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'nis'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',
        ]);

        $foto = '/images/ava.jpg';
        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('fotos','public');
        }

        $siswa = new Siswa;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->jurusan = $request->jurusan;
        $siswa->foto = $foto;
        $siswa->save();
        return redirect()->route('siswa.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();
        return view('siswa.edit',['siswa'=>$siswa,'kriterias'=>$kriterias,'alternatifs'=>$alternatifs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $request->validate([
            'nama'=>'required',
            'nis'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',
        ]);

       
        if ($request->file('foto')) {
            if ($siswa->foto && file_exists(storage_path('app/public/'.$siswa->foto))) {
                Storage::delete('public/'.$siswa->foto);
            }
            $file = $request->file('foto')->store('fotos','public');
            $siswa->foto = $file;
        }
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->jurusan = $request->jurusan;
        $siswa->save();
        return redirect()->route('siswa.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        if ($siswa->foto && file_exists(storage_path('app/public/'.$siswa->foto))) {
            Storage::delete('public/'.$siswa->foto);
        }
        $siswa->delete();
        return redirect()->route('siswa.index'); 
    }
}
