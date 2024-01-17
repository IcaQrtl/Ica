@extends('adminlte::page')

@section('title', 'Data Nilai')

@section('content_header')
    <h1 class="m-0 text-dark">Data Nilai</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">
    </div>
</div>

<!-- Data Kelas -->
<div class="card-body">
    <h5>NISN : {{ $nisn }}</h5>
    <h5>Nama Siswa : {{ $nama }}</h5>
    <table class="table table-bordered text-center justify-content-center">
        <thead>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Nilai</th>
            <th>Kompetensi Dasar</th>
            <th>Hadir</th>
            <th>Izin</th>
            <th>Sakit</th>
            <th>Alpha</th>
            <th>Total</th>
            
        </thead>
        <tbody>
        @php $no=1; @endphp
            @foreach($absen as $absens)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$absens->mata_pelajaran}}</td>
                    <td>{{$absens->nilai}}</td>
                    <td>{{$absens->kompetensi_dasar}}</td>
                    <td>{{$absens->hadir}}</td>
                    <td>{{$absens->ijin}}</td>
                    <td>{{$absens->sakit}}</td>
                    <td>{{$absens->alpha}}</td>
                    <td>{{$absens->total}}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>            
</div>

</div>

@endsection

@push('js')
<script>

</script>
@endpush