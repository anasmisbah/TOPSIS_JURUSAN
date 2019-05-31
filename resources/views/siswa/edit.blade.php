@extends('template.master')
@section('css')
 <!-- forms CSS
		============================================ -->
        <link rel="stylesheet" href="/template/css/form/all-type-forms.css">

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Form Edit Siswa</h1>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="all-form-element-inner">
                                    <form action="{{ route('siswa.update',['id'=>$siswa->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Nama</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" value="{{ $siswa->nama }}" name="nama" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">NIS</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" value="{{ $siswa->nis }}" name="nis" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Kelas</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <div class="form-select-list">
                                                        <select class="form-control custom-select-value" name="kelas">
                                                                <option {{ $siswa->kelas == 'X' ? 'selected':'' }} value="X">X</option>
                                                                <option {{ $siswa->kelas == 'XI' ? 'selected':'' }} value="XI">XI</option>
                                                                <option {{ $siswa->kelas == 'XII' ? 'selected':'' }} value="XII">XII</option>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Jurusan</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <div class="form-select-list">
                                                        <select class="form-control custom-select-value" name="jurusan">        
                                                            @foreach ($alternatifs as $alternatif)
                                                                <option {{ $siswa->jurusan == $alternatif->nama ? 'selected':'' }} value="{{ $alternatif->nama }}">{{ $alternatif->nama }}</option>    
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Foto</label>
                                                </div>
                                                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="file-upload-inner ts-forms">
                                                        <div class="input prepend-small-btn">
                                                            <div class="file-button">
                                                                Browse
                                                                <input name="foto" type="file" onchange="document.getElementById('prepend-small-btn').value = this.value;">
                                                            </div>
                                                            <input value="{{ $siswa->foto }}" disabled type="text" id="prepend-small-btn" placeholder="no file selected">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($kriterias as $key => $kriteria)
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">{{ $kriteria->nama }}</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input value="{{ $siswa->kriterias[$key]->pivot->nilai }}" required type="text" class="form-control" name="kriteria[{{ $key }}]" required/>
                                                    </div>
                                                </div>
                                            </div> 
                                        @endforeach
                                        <div class="form-group-inner">
                                            <div class="login-btn-inner">
                                                <div class="row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="col-lg-9">
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <a class="btn btn-default" href="{{ route('alternatif.index') }}">Kembali</a>
                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Simpan Perubahan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection