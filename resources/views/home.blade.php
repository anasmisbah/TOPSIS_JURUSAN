@extends('template.master')

@section('content')
<div class="widgets-programs-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Kriteria</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-apps"></i>
                            </div>
                            <div class="m-t-xl widget-cl-1">
                                <h1 class="text-success">{{ $jmlkriteria }}</h1>
                                <small>
                                            Lorem Ipsum is simply dummy text of the printing and Lorem <strong>typesetting industry</strong> spa.
                                        </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Siswa</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-professor"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ $jmlsiswa }}</h1>
                                <small>
                                            Lorem Ipsum is simply dummy text of the printing and Lorem <strong>typesetting industry</strong> spa.
                                        </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Alternatif</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-department"></i>
                            </div>
                            <div class="m-t-xl widget-cl-3">
                                <h1 class="text-warning">{{ $jmlalternatif }}</h1>
                                <small>
                                            Lorem Ipsum is simply dummy text of the printing and Lorem <strong>typesetting industry</strong> spa.
                                        </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
