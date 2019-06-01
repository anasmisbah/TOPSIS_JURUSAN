<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Siswa;
use App\Kriteria;
use App\Alternatif;
use App\Preferensi;

class PerhitunganController extends Controller
{
    public function daftarSiswa()
    {
        
        $siswas = Siswa::all();
        $kriterias = Kriteria::all();

        return view('perhitungan.siswa',['siswas'=>$siswas,'kriterias'=>$kriterias]);
    }

    public function prosesHitung($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();
        $matriks = [];
        // kriteria rating kecocokan
        $submenu = [
            [
                [1,2,3,4,5],
                [1,2,3,3,4],
                [1,2,3,3,3]
            ],
            [
                [1,2,3,3,4],
                [1,2,3,4,5],
                [1,2,3,3,3]
            ],
            [
               
                [1,2,3,3,4],
                [1,2,3,3,4],
                [1,2,3,4,5],
            ],
        ];
        $urut = 0;
        //matriks keputusan
        foreach ($kriterias as $x => $kriteria) {
            $urut++;
            foreach ($alternatifs as $y => $alternatif) {
                if( $siswa->kriterias[$x]->pivot->nilai <51 ){
                    $matriks[$y][$x] = $submenu[$urut-1][$y][0];
                }elseif ($siswa->kriterias[$x]->pivot->nilai >=51 && $siswa->kriterias[$x]->pivot->nilai <=65 ) {
                    $matriks[$y][$x] = $submenu[$urut-1][$y][1];
                }elseif ($siswa->kriterias[$x]->pivot->nilai >=66 &&$siswa->kriterias[$x]->pivot->nilai <=75) {
                    $matriks[$y][$x] = $submenu[$urut-1][$y][2];
                }elseif ($siswa->kriterias[$x]->pivot->nilai >=76 &&$siswa->kriterias[$x]->pivot->nilai <=80) {
                    $matriks[$y][$x] = $submenu[$urut-1][$y][3];
                }elseif ($siswa->kriterias[$x]->pivot->nilai > 80) {
                    $matriks[$y][$x] = $submenu[$urut-1][$y][4];
                } 
            }
            if($urut%count($alternatifs) ==0){
                $urut = 0;
            }
        }

        
        $matrikskuadrat =[];
        $jmlperkolommatrikskuad =[];
        $akarjmlperkolommatrikskuad =[];
        $matriksternormalisasi = [];
        $matriksternormalisasiterbobot =[];
        //initialisasi
        foreach ($kriterias as $x => $kriteria) {
            $jmlperkolommatrikskuad[$x] = 0;
        }
        foreach ($kriterias as $x => $kriteria) {
            foreach ($alternatifs as $y =>$alternatif ) {
                $matrikskuadrat[$y][$x] = pow($matriks[$y][$x],2);
                $nilai = $matrikskuadrat[$y][$x];
                $jmlperkolommatrikskuad[$x] += $nilai;
            }
            $akarjmlperkolommatrikskuad[$x] =sqrt($jmlperkolommatrikskuad[$x]);
        }
        //menghitung matriks ternormalisasi
        foreach ($kriterias as $x => $kriteria) {
            foreach ($alternatifs as $y =>$alternatif ) {
                $matriksternormalisasi[$y][$x] = $matriks[$y][$x]/$akarjmlperkolommatrikskuad[$x];
            }
        }

        //menghitung matriks ternormalisasi terbobot
        foreach ($kriterias as $x => $kriteria) {
            foreach ($alternatifs as $y =>$alternatif ) {
                $matriksternormalisasiterbobot[$y][$x] = $matriksternormalisasi[$y][$x]*$kriteria->bobot;
            }
        }

        $solusiidelaplus =[];
        $solusiidealminus =[];
        foreach ($kriterias as $x => $kriteria) {
            $solusiidelaplus[$x] =0;
        $solusiidealminus[$x] =0;
        }
        
        //solusi ideal posistif
        for ($x=0; $x < $kriterias->count(); $x++) { 
            $solusiidelaplus[$x]= $matriksternormalisasiterbobot[0][$x];
            for ($y=0; $y < $alternatifs->count() ; $y++) { 
                if ($kriterias[$x]->kategori == 'benefit') {
                    if ($solusiidelaplus[$x] < $matriksternormalisasiterbobot[$y][$x]) {
                        $solusiidelaplus[$x]= $matriksternormalisasiterbobot[$y][$x];
                    }
                } else {
                    if ($solusiidelaplus[$x] > $matriksternormalisasiterbobot[$y][$x]) {
                        $solusiidelaplus[$x]= $matriksternormalisasiterbobot[$y+1][$x];
                    }
                }
            }
        }
        //solusi ideal negatif
        for ($x=0; $x < $kriterias->count(); $x++) { 
            $solusiidealminus[$x] = $matriksternormalisasiterbobot[0][$x];
            for ($y=0; $y < $alternatifs->count() - 1 ; $y++) { 
                if ($kriterias[$x]->kategori == 'benefit') {
                    if ($solusiidealminus[$x] > $matriksternormalisasiterbobot[$y][$x]) {
                        $solusiidealminus[$x]= $matriksternormalisasiterbobot[$y][$x];
                    }
                } else {
                    if ($solusiidealminus[$x] < $matriksternormalisasiterbobot[$y][$x]) {
                        $solusiidealminus[$x]= $matriksternormalisasiterbobot[$y+1][$x];
                    }
                }
            }
        }

        $matriksjaraksolusidplus =[];
        $matriksjaraksolusidminus =[];

        //menghitung matriks jarak solusi D+
        foreach ($kriterias as $x => $kriteria) {
            foreach ($alternatifs as $y =>$alternatif ) {
                $matriksjaraksolusidplus[$y][$x]=pow(($matriksternormalisasiterbobot[$y][$x]-$solusiidelaplus[$x]),2);
            }
        }

        //menghitung matriks jarak solusi D-
        foreach ($kriterias as $x => $kriteria) {
            foreach ($alternatifs as $y =>$alternatif ) {
                $matriksjaraksolusidminus[$y][$x]=pow(($matriksternormalisasiterbobot[$y][$x]-$solusiidealminus[$x]),2);
            }
        }

        $jmlperbarismatrikssolusidplus =[];
        $akarjmlperbarismatrikssolusidplus =[];

        $jmlperbarismatrikssolusidminus =[];
        $akarjmlperbarismatrikssolusidminus =[];

        //inisialisasi
        foreach ($alternatifs as $key => $alternatif) {
            $jmlperbarismatrikssolusidminus[$key] =0;
            $jmlperbarismatrikssolusidplus[$key]=0;
        }
        
        //menghitung sum dan akar jarak solusi D+
        foreach ($alternatifs as $x => $alternatif) {
            foreach ($kriterias as $y =>$kriteria ) {
                $jmlperbarismatrikssolusidplus[$x] += $matriksjaraksolusidplus[$x][$y];
            }
            $akarjmlperbarismatrikssolusidplus[$x] = sqrt($jmlperbarismatrikssolusidplus[$x]);
        }
        
        //menghitung sum dan akar jarak solusi D-
        foreach ($alternatifs as $x => $alternatif) {
            foreach ($kriterias as $y =>$kriteria ) {
                $jmlperbarismatrikssolusidminus[$x] += $matriksjaraksolusidminus[$x][$y];
            }
            $akarjmlperbarismatrikssolusidminus[$x] =sqrt($jmlperbarismatrikssolusidminus[$x]);
        }


        $nilaipreferensi = [];
        //menghitung nilai preferensi
        foreach ($alternatifs as $x => $alternatif) {
            $nilaipreferensi[$x] = ($akarjmlperbarismatrikssolusidminus[$x]/($akarjmlperbarismatrikssolusidminus[$x]+$akarjmlperbarismatrikssolusidplus[$x]));

            Preferensi::updateOrCreate(
                [
                    'siswa_id'=>$siswa->id,
                    'alternatif_id'=>$alternatif->id
                ],
                [
                    'nilai_preferensi'=>$nilaipreferensi[$x]
                ]
            );
        }
        
        $preferensiDB = Preferensi::where('siswa_id',$id)->orderBy('nilai_preferensi','desc')->get();
        return view('perhitungan.hasilsiswa',[
            'matriks' => $matriks,
            'kriterias'=>$kriterias,
            'alternatifs'=>$alternatifs,
            'matriksternormalisasi'=>$matriksternormalisasi,
            'matriksternormalisasiterbobot'=> $matriksternormalisasiterbobot,
            'solusiidelaplus'=> $solusiidelaplus,
            'solusiidealminus'=> $solusiidealminus,
            'matriksjaraksolusidplus'=> $matriksjaraksolusidplus,
            'matriksjaraksolusidminus'=> $matriksjaraksolusidminus,
            'akarjmlperbarismatrikssolusidminus'=>$akarjmlperbarismatrikssolusidminus,
            'akarjmlperbarismatrikssolusidplus'=>$akarjmlperbarismatrikssolusidplus,
            'preferensi'=>$preferensiDB,
        ]);
    }

    public function perangkingan()
    {
        $siswaall = Siswa::all();
        foreach ($siswaall as  $siswaitem) {
            $id = $siswaitem->id;
            $siswa = Siswa::findOrFail($id);
            $kriterias = Kriteria::all();
            $alternatifs = Alternatif::all();
            $matriks = [];
            // kriteria rating kecocokan
            $submenu = [
                [
                    [1,2,3,4,5],
                    [1,2,3,3,4],
                    [1,2,3,3,3]
                ],
                [
                    [1,2,3,3,4],
                    [1,2,3,4,5],
                    [1,2,3,3,3]
                ],
                [
                
                    [1,2,3,3,4],
                    [1,2,3,3,4],
                    [1,2,3,4,5],
                ],
            ];
            $urut = 0;
            //matriks keputusan
            foreach ($kriterias as $x => $kriteria) {
                $urut++;
                foreach ($alternatifs as $y => $alternatif) {
                    if( $siswa->kriterias[$x]->pivot->nilai <51 ){
                        $matriks[$y][$x] = $submenu[$urut-1][$y][0];
                    }elseif ($siswa->kriterias[$x]->pivot->nilai >=51 && $siswa->kriterias[$x]->pivot->nilai <=65 ) {
                        $matriks[$y][$x] = $submenu[$urut-1][$y][1];
                    }elseif ($siswa->kriterias[$x]->pivot->nilai >=66 &&$siswa->kriterias[$x]->pivot->nilai <=75) {
                        $matriks[$y][$x] = $submenu[$urut-1][$y][2];
                    }elseif ($siswa->kriterias[$x]->pivot->nilai >=76 &&$siswa->kriterias[$x]->pivot->nilai <=80) {
                        $matriks[$y][$x] = $submenu[$urut-1][$y][3];
                    }elseif ($siswa->kriterias[$x]->pivot->nilai > 80) {
                        $matriks[$y][$x] = $submenu[$urut-1][$y][4];
                    } 
                }
                if($urut%count($alternatifs) ==0){
                    $urut = 0;
                }
            }

            
            $matrikskuadrat =[];
            $jmlperkolommatrikskuad =[];
            $akarjmlperkolommatrikskuad =[];
            $matriksternormalisasi = [];
            $matriksternormalisasiterbobot =[];
            //initialisasi
            foreach ($kriterias as $x => $kriteria) {
                $jmlperkolommatrikskuad[$x] = 0;
            }
            foreach ($kriterias as $x => $kriteria) {
                foreach ($alternatifs as $y =>$alternatif ) {
                    $matrikskuadrat[$y][$x] = pow($matriks[$y][$x],2);
                    $nilai = $matrikskuadrat[$y][$x];
                    $jmlperkolommatrikskuad[$x] += $nilai;
                }
                $akarjmlperkolommatrikskuad[$x] =sqrt($jmlperkolommatrikskuad[$x]);
            }
            //menghitung matriks ternormalisasi
            foreach ($kriterias as $x => $kriteria) {
                foreach ($alternatifs as $y =>$alternatif ) {
                    $matriksternormalisasi[$y][$x] = $matriks[$y][$x]/$akarjmlperkolommatrikskuad[$x];
                }
            }

            //menghitung matriks ternormalisasi terbobot
            foreach ($kriterias as $x => $kriteria) {
                foreach ($alternatifs as $y =>$alternatif ) {
                    $matriksternormalisasiterbobot[$y][$x] = $matriksternormalisasi[$y][$x]*$kriteria->bobot;
                }
            }

            $solusiidelaplus =[];
            $solusiidealminus =[];
            foreach ($kriterias as $x => $kriteria) {
                $solusiidelaplus[$x] =0;
            $solusiidealminus[$x] =0;
            }
            
            //solusi ideal posistif
            for ($x=0; $x < $kriterias->count(); $x++) { 
                $solusiidelaplus[$x]= $matriksternormalisasiterbobot[0][$x];
                for ($y=0; $y < $alternatifs->count() ; $y++) { 
                    if ($kriterias[$x]->kategori == 'benefit') {
                        if ($solusiidelaplus[$x] < $matriksternormalisasiterbobot[$y][$x]) {
                            $solusiidelaplus[$x]= $matriksternormalisasiterbobot[$y][$x];
                        }
                    } else {
                        if ($solusiidelaplus[$x] > $matriksternormalisasiterbobot[$y][$x]) {
                            $solusiidelaplus[$x]= $matriksternormalisasiterbobot[$y+1][$x];
                        }
                    }
                }
            }
            //solusi ideal negatif
            for ($x=0; $x < $kriterias->count(); $x++) { 
                $solusiidealminus[$x] = $matriksternormalisasiterbobot[0][$x];
                for ($y=0; $y < $alternatifs->count() - 1 ; $y++) { 
                    if ($kriterias[$x]->kategori == 'benefit') {
                        if ($solusiidealminus[$x] > $matriksternormalisasiterbobot[$y][$x]) {
                            $solusiidealminus[$x]= $matriksternormalisasiterbobot[$y][$x];
                        }
                    } else {
                        if ($solusiidealminus[$x] < $matriksternormalisasiterbobot[$y][$x]) {
                            $solusiidealminus[$x]= $matriksternormalisasiterbobot[$y+1][$x];
                        }
                    }
                }
            }

            $matriksjaraksolusidplus =[];
            $matriksjaraksolusidminus =[];

            //menghitung matriks jarak solusi D+
            foreach ($kriterias as $x => $kriteria) {
                foreach ($alternatifs as $y =>$alternatif ) {
                    $matriksjaraksolusidplus[$y][$x]=pow(($matriksternormalisasiterbobot[$y][$x]-$solusiidelaplus[$x]),2);
                }
            }

            //menghitung matriks jarak solusi D-
            foreach ($kriterias as $x => $kriteria) {
                foreach ($alternatifs as $y =>$alternatif ) {
                    $matriksjaraksolusidminus[$y][$x]=pow(($matriksternormalisasiterbobot[$y][$x]-$solusiidealminus[$x]),2);
                }
            }

            $jmlperbarismatrikssolusidplus =[];
            $akarjmlperbarismatrikssolusidplus =[];

            $jmlperbarismatrikssolusidminus =[];
            $akarjmlperbarismatrikssolusidminus =[];

            //inisialisasi
            foreach ($alternatifs as $key => $alternatif) {
                $jmlperbarismatrikssolusidminus[$key] =0;
                $jmlperbarismatrikssolusidplus[$key]=0;
            }
            
            //menghitung sum dan akar jarak solusi D+
            foreach ($alternatifs as $x => $alternatif) {
                foreach ($kriterias as $y =>$kriteria ) {
                    $jmlperbarismatrikssolusidplus[$x] += $matriksjaraksolusidplus[$x][$y];
                }
                $akarjmlperbarismatrikssolusidplus[$x] = sqrt($jmlperbarismatrikssolusidplus[$x]);
            }
            
            //menghitung sum dan akar jarak solusi D-
            foreach ($alternatifs as $x => $alternatif) {
                foreach ($kriterias as $y =>$kriteria ) {
                    $jmlperbarismatrikssolusidminus[$x] += $matriksjaraksolusidminus[$x][$y];
                }
                $akarjmlperbarismatrikssolusidminus[$x] =sqrt($jmlperbarismatrikssolusidminus[$x]);
            }


            $nilaipreferensi = [];
            //menghitung nilai preferensi
            foreach ($alternatifs as $x => $alternatif) {
                $nilaipreferensi[$x] = ($akarjmlperbarismatrikssolusidminus[$x]/($akarjmlperbarismatrikssolusidminus[$x]+$akarjmlperbarismatrikssolusidplus[$x]));

                Preferensi::updateOrCreate(
                    [
                        'siswa_id'=>$siswa->id,
                        'alternatif_id'=>$alternatif->id
                    ],
                    [
                        'nilai_preferensi'=>$nilaipreferensi[$x]
                    ]
                );
            }
        }
        return view('perhitungan.rangking',compact('siswaall'));
    }
    public function cetakhasil()
    {
        $siswaall = Siswa::all();
        $pdf = PDF::loadView('perhitungan.cetakhasil', ['siswaall'=>$siswaall]);
        return $pdf->download('hasilperhitungan.pdf');
        //return view('perhitungan.cetakhasil',compact('siswaall'));
    }
}
