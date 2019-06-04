@extends('template.master')
@section('content')
<div class="container">
    <div class="row text-center" style="margin-bottom:10px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Hasil Penjurusan Sistem</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Hasil Penjurusan</th>
                                    <th>Data Awal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswaall as $x => $siswa)
                                    <tr>
                                        <td>{{ $x+1 }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->preferensi->sortByDesc('nilai_preferensi')->first()->alternatif->nama }}</td>
                                        <td>{{ $siswa->jurusan }}</td>
                                        <td>{{ $siswa->preferensi->sortByDesc('nilai_preferensi')->first()->alternatif->nama == $siswa->jurusan ? "Sama":"Tidak Sama" }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
                <a href="{{ route('perhitungan.cetakhasil') }}" class="btn-block btn btn-custon-rounded-four btn-primary btn-lg"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> download</a>
        </div>
        
    </div>
</div>
@endsection