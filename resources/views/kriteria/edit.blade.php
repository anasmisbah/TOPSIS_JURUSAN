@extends('template.master')
@section('css')
     <!-- forms CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('/template/css/form/all-type-forms.css') }}">

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Form Edit Kriteria</h1>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="all-form-element-inner">
                                    <form action="{{ route('kriteria.update',['id'=>$kriteria->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Nama Kriteria</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input value="{{ $kriteria->nama }}" type="text" class="form-control" name="nama" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Bobot Kriteria</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input value="{{ $kriteria->bobot }}" type="number" class="form-control" min="0" name="bobot" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <label class="login2 pull-right pull-right-pro">Jenis Kriteria</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                    <div class="bt-df-checkbox pull-left">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="i-checks pull-left">
                                                                    <label>
                                                                            <input {{ $kriteria->kategori == "benefit"?'checked':'' }} type="radio" value="benefit" name="kategori"> <i></i>Benefit</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="i-checks pull-left">
                                                                    <label>
                                                                            <input {{ $kriteria->kategori == "cost"?'checked':'' }} type="radio" value="cost" name="kategori"> <i></i>cost</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="login-btn-inner">
                                                <div class="row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="col-lg-9">
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <button class="btn btn-white" type="submit">Kembali</button>
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
@section('script')
       <!-- icheck JS
		============================================ -->
        <script src="/template/js/icheck/icheck.min.js"></script>
        <script src="/template/js/icheck/icheck-active.js"></script>
    
@endsection