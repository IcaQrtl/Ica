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
    <p>NISN : {{ $nisn }}</p>
    <p>Nama Siswa : {{ $nama }}</p>
    <h3>Data Kelas</h3>
    <table class="table table-bordered text-center justify-content-center">
        <thead>
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
            @foreach($nilai as $nilais)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$nilais->mata_pelajaran}}</td>
                    <td>{{$nilais->nilai}}</td>
                    <td>{{$nilais->kompetensi_dasar}}</td>
                    <td>{{$nilais->hadir}}</td>
                    <td>{{$nilais->ijin}}</td>
                    <td>{{$nilais->sakit}}</td>
                    <td>{{$nilais->alpha}}</td>
                    <td>{{$nilais->total}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>            
</div>

<!--modal edit-->
<div class="modal fade" id="EditNilai" tabindex="-1" role="dialog" aria-labelledby="EditNilaiLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="EditNilaiLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="datanilai" name="datanilai" method="post" action="{{route('update.datanilai')}}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="NISN">Nama Siswa</label>
                    <select name="NISN" class="form-control" id="edit-NISN">
                        <option value="">--Siswa--</option>
                        @foreach($siswas as $siswa)
                            <option value="{{$siswa->NISN}}">{{$siswa->nama}}</option>
                        @endforeach
                    </select>                                            
                </div>
                <div class="form-group">
                    <label for="matapelajaran">Mata Pelajaran</label>
                    <select name="matapelajaran" class="form-control" id="edit-matapelajaran">
                        <option value="">--Mata Pelajaran--</option>
                        @foreach($matapelajaran as $mapel)
                            <option value="{{$mapel->nama}}">{{$mapel->nama}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <input type="text" class="form-control" name="nilai" id="edit-nilai" required/>
                </div>
                <div class="form-group">
                    <label for="kompetensi_dasar">Kompetensi Dasar</label>
                    <textarea name="kompetensi_dasar" id="edit-kompetensi_dasar" cols="62" rows="5" required></textarea>
                </div>

                <input type="hidden" class="form-control" name="created_by" value="{{ auth()->user()->name }}" required/>
                <input type="hidden" class="form-control" name="id" id="edit-id"/>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>

@endsection

@push('js')
<script>

</script>
@endpush