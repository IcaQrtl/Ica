@extends('adminlte::page')

@section('title', 'Data Nilai & Absen')

@section('content_header')
    <h1 class="m-0 text-dark">Data Nilai & Absen</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
            <table class="table table-bordered text-center justify-content-center" id="table-data">
                <thead>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Kompetensi Dasar</th>
                    <th>Hadir</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alpha</th>
                    <th>Total</th>
                    <th>Penilai</th>
                </thead>
                <tbody>
                @php $no=1; @endphp
                    @foreach($siswa as $siswas)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$siswas->NISN}}</td>
                            <td>{{$siswas->mata_pelajaran}}</td>
                            <td>{{$siswas->nilai}}</td>
                            <td>{{$siswas->kompetensi_dasar}}</td>
                            <td>{{$siswas->hadir}}</td>
                            <td>{{$siswas->sakit}}</td>
                            <td>{{$siswas->ijin}}</td>
                            <td>{{$siswas->alpha}}</td>
                            <td>{{$siswas->total}}</td>
                            <td>{{$siswas->created_by}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    
</script>
@endpush