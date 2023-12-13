@extends('adminlte::page')

@section('title', 'Data Nilai')

@section('content_header')
    <h1 class="m-0 text-dark">Input Data Nilai</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TambahNilai">
             Input Data Nilai</button>
             <table id="table-data" class="table table-bordered">
                <thead>
                    {{--Data Kelas--}}
                </thead>
            </table>
        </div>
    </div>
</div>

<!--modal-->
<div class="modal fade" id="TambahNilai" tabindex="-1" role="dialog" aria-labelledby="TambahNilaiLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="TambahNilaiLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="datanilai" name="datakelas" method="post" action="{{route('create.datanilai')}}" enctype="multipart/form-data">
                @csrf
                <h5>Data Nilai</h5>
                <div class="form-group">
                    <label for="NISN">Nama Siswa</label>
                    <select name="NISN" class="form-control" id="NISN">
                        <option value="">--Siswa--</option>
                        @foreach($siswa as $siswa)
                            <option value="{{$siswa->NISN}}">{{$siswa->nama}}</option>
                        @endforeach
                    </select>                                            
                </div>
                <div class="form-group">
                    <label for="matapelajaran">Mata Pelajaran</label>
                    <select name="matapelajaran" class="form-control" id="matapelajaran">
                        <option value="">--Mata Pelajaran--</option>
                        @foreach($matapelajaran as $mapel)
                            <option value="{{$mapel->nama}}">{{$mapel->nama}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <input type="text" class="form-control" name="nilai" id="nilai" required/>
                </div>
                <div class="form-group">
                    <label for="kompetensi_dasar">Kompetensi Dasar</label>
                    <textarea name="kompetensi_dasar" id="kompetensi_dasar" cols="62" rows="5" required></textarea>
                </div>
                <input type="hidden" class="form-control" name="created_by" id="created_by" value="{{ auth()->user()->name }}" required/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>  
    </div>
</div>
</div>

<!-- Data Kelas -->
<div class="card-body">
    <h3>Data Kelas</h3>
    <table class="table table-bordered text-center justify-content-center">
        <thead>
            <th>No</th>
            <th>NISN</th>
            <th>Mata Pelajaran</th>
            <th>Nilai</th>
            <th>Kompetensi Dasar</th>
            <th>Penilai</th>
            <th>Aksi</th>
        </thead>
        <tbody>
        @php $no=1; @endphp
            @foreach($nilai as $nilais)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$nilais->NISN}}</td>
                    <td>{{$nilais->mata_pelajaran}}</td>
                    <td>{{$nilais->nilai}}</td>
                    <td>{{$nilais->kompetensi_dasar}}</td>
                    <td>{{$nilais->created_by}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic exxample">
                            <button type="button" id="btn-edit-nilai" class="btn btn-success" data-toggle="modal" data-target="#EditNilai" data-id="{{ $nilais->id }}">Edit</button>    
                            <a href="{{ route('delete.datanilai', $nilais->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                        </div>
                    </td>
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
    //Edit
    $(function(){
        $(document).on('click','#btn-edit-nilai', function(){
            let id = $(this).data('id');
            // alert(id);
            console.log(id);
            $.ajax({
                type: "get",
                url: "{{url('datanilai/edit')}}/"+id,
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    $('#edit-name').val(res.name);
                    $('#edit-id').val(res.id);
                    $('#edit-NISN').val(res.NISN);
                    $('#edit-matapelajaran').val(res.matapelajaran);
                    $('#edit-nilai').val(res.nilai);
                    $('#edit-kompetensi_dasar').val(res.kompetensi_dasar);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    console.error(status);
                    console.error(error);
                    console.log('error')
                }
            });
        });
    });
</script>
@endpush