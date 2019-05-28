@extends('template.master')
@section('css')
<link rel="stylesheet" href="{{ asset('template/css/data-table/bootstrap-table.css') }}">
<link rel="stylesheet" href="{{ asset('template/css/data-table/bootstrap-editable.css') }}">
@endsection
@section('content')
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Tabel Kriteria</h1>
                        </div>
                    </div>
                    <div class="add-product">
                            <a href="{{ route('kriteria.create') }}">Tambah Kriteria</a>
                        </div>

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id">ID</th>
                                        <th data-field="nama" data-editable="true">Nama Kriteria</th>
                                        <th data-field="bobot" data-editable="true">Bobot</th>
                                        <th data-field="kategori" data-editable="true">Kategori</th>
                                        <th data-field="aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriterias as $kriteria)
                                        <tr>
                                            <td>{{ $kriteria->id }}</td>
                                            <td>{{ $kriteria->nama }}</td>
                                            <td>{{ $kriteria->bobot }}</td>
                                            <td>{{ $kriteria->kategori }}</td>
                                            <td >
                                                        <a data-toggle="tooltip" title="Edit" class="btn btn-primary" href="{{ route('kriteria.edit',['id'=>$kriteria->id]) }}"><i class="fa fa-edit"></i></a>
                                                        <form style="display:inline;"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')" 
                                                        action="{{route('kriteria.destroy', $kriteria->id)}}" 
                                                        method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" value="Delete">
                                                                    <i class="fa fa-trash"></i></button>
                                                        </form>  
                                            </td>
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
</div>

@endsection
@section('script')
    <!-- data table JS
		============================================ -->
        <script src="{{ asset('/template/js/data-table/bootstrap-table.js') }}"></script>
        <script src="{{ asset('/template/js/data-table/tableExport.js') }}"></script>
        <script src="{{ asset('/template/js/data-table/data-table-active.js') }}"></script>
        <script src="{{ asset('/template/js/data-table/bootstrap-table-editable.js') }}"></script>
        <script src="{{ asset('/template/js/data-table/bootstrap-editable.js') }}"></script>
        <script src="{{ asset('/template/js/data-table/bootstrap-table-resizable.js') }}"></script>
        <script src="{{ asset('/template/js/data-table/colResizable-1.5.source.js') }}"></script>
        <script src="{{ asset('/template/js/data-table/bootstrap-table-export.js') }}"></script>
    
@endsection