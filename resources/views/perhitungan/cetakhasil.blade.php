<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="container">
        <div class="row text-center" style="margin-top:20px">
            <h1>Hasil Penjurusan Sistem</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Hasil Penjurusan</th>
                        <th>Data Awal</th>
                        <th>Keterangan</th>
                    </tr>
            
                    @foreach ($siswaall as $x => $siswa)
                        <tr>
                            <td>{{ $x+1 }}</td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->jurusan }}</td>
                            <td>{{ $siswa->preferensi->sortByDesc('nilai_preferensi')->first()->alternatif->nama }}</td>
                            <td>{{ $siswa->preferensi->sortByDesc('nilai_preferensi')->first()->alternatif->nama == $siswa->jurusan ? "Sama":"Tidak Sama" }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            
        </div>
    </div>
   
</body>
</html>