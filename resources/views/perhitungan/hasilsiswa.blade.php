@extends('template.master')
@section('content')
<div class="container">
    <div class="row text-center" style="margin-bottom:10px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Matriks Keputusan</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $x => $alternatif)
                                    <tr>
                                        <td>{{ $x+1 }}</td>
                                        <td>{{ $alternatif->nama }}</td>
                                        @foreach ($kriterias as $y => $kriteria)
                                            <td>{{ $matriks[$x][$y] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center" style="margin-bottom:10px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Matriks Ternormalisasi</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $x => $alternatif)
                                    <tr>
                                        <td>{{ $x+1 }}</td>
                                        <td>{{ $alternatif->nama }}</td>
                                        @foreach ($kriterias as $y => $kriteria)
                                            <td>{{ round($matriksternormalisasi[$x][$y],4) }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center" style="margin-bottom:10px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Matriks Ternormalisasi Terbobot</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $x => $alternatif)
                                    <tr>
                                        <td>{{ $x+1 }}</td>
                                        <td>{{ $alternatif->nama }}</td>
                                        @foreach ($kriterias as $y => $kriteria)
                                            <td>{{ round($matriksternormalisasiterbobot[$x][$y],4) }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center" style="margin-bottom:10px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Matriks Solusi Ideal</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Solusi Ideal</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>A+</td>
                                    @foreach ($kriterias as $y => $kriteria)
                                        <td>{{ round($solusiidelaplus[$y],4) }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>A-</td>
                                    @foreach ($kriterias as $y => $kriteria)
                                        <td>{{ round($solusiidealminus[$y],4) }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="row text-center" style="margin-bottom:10px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Matriks Jarak Solusi D+</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                    @endforeach
                                    <th>Akar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $x => $alternatif)
                                    <tr>
                                        <td>{{ $x+1 }}</td>
                                        <td>{{ $alternatif->nama }}</td>
                                        @foreach ($kriterias as $y => $kriteria)
                                            <td>{{ round($matriksjaraksolusidplus[$x][$y],4) }}</td>
                                        @endforeach
                                        <td>{{ round($akarjmlperbarismatrikssolusidplus[$x],4) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center" style="margin-bottom:10px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Matriks Jarak Solusi D-</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                    @endforeach
                                    <th>Akar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $x => $alternatif)
                                    <tr>
                                        <td>{{ $x+1 }}</td>
                                        <td>{{ $alternatif->nama }}</td>
                                        @foreach ($kriterias as $y => $kriteria)
                                            <td>{{ round($matriksjaraksolusidminus[$x][$y],4) }}</td>
                                        @endforeach
                                        <td>{{ round($akarjmlperbarismatrikssolusidminus[$x],4) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center" style="margin-bottom:10px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Nilai Preferensi</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alternatif</th>
                                    <th>Preferensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($preferensi as $x => $item)
                                    <tr>
                                        <td>{{ $x+1 }}</td>
                                        <td>{{ $item->alternatif->nama }}</td>
                                        <td>{{ round($item->nilai_preferensi,4) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>          
</div>

@endsection