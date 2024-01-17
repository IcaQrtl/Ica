@extends('adminlte::page')

@section('title', 'Data Kelas')

@section('content_header')
    <h1 class="m-0 text-dark">Input Data Kelas</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TambahKelas">
             Input Data Kelas</button>
             <table id="table-data" class="table table-bordered">
                <thead>
                    {{--Data Kelas--}}
                </thead>
            </table>
        </div>
    </div>

<!--modal-->
<div class="modal fade" id="TambahKelas" tabindex="-1" role="dialog" aria-labelledby="TambahKelasLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="TambahKelasLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
                <form id="datakelas" name="datakelas" method="post" action="{{route('create.datakelas')}}" enctype="multipart/form-data">
                    @csrf
                    <h5>Data Kelas</h5>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" name="kelas" id="kelas" required/>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" required/>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required/>
                    </div>
                    <div class="form-group">
                        <label for="wali">Wali Kelas</label>
                        <select name="wali" class="form-control" id="wali">
                            <option value="">--Wali Kelas--</option>
                            @foreach($wali as $wali)
                                <option value="{{$wali->id}}">{{$wali->nama}}</option>
                            @endforeach
                        </select>                                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
    </div>
</div>

<!--modal edit-->
<div class="modal fade" id="EditKelas" tabindex="-1" role="dialog" aria-labelledby="EditKelasLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="EditKelasLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="datakelas" name="datakelas" method="post" action="{{route('update.datakelas')}}" enctype="multipart/form-data">
                @csrf
                
                <h5>Data Guru</h5>
                <div class="form-group">
                    <label for="nama">Nama Kelas</label>
                    <input type="text" class="form-control" name="nama" id="edit-nama" readonly/>
                </div>
                <div class="form-group">
                    <label for="wali">Wali Kelas</label>
                    <select name="wali" class="form-control" id="wali">
                        <option value="">--Wali Kelas--</option>
                        @foreach($wali as $walis)
                            <option value="{{$wali->id}}">{{$wali->nama}}</option>
                        @endforeach
                    </select>                                            
                </div>
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

<!-- Data Kelas -->
<div class="card-body">
    <h3>Data Kelas</h3>
    <table class="table table-bordered text-center justify-content-center">
        <thead>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Wali Kelas</th>
            <th>Aksi</th>
        </thead>
        <tbody>
        @php $no=1; @endphp
            @foreach($datakelas as $datakelass)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$datakelass->nama_kelas}}</td>
                    <td>{{$datakelass->guru_nama}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" id="btn-edit-kelas" class="btn btn-success" data-toggle="modal" data-target="#EditKelas" data-id="{{ $datakelass->id }}">Edit</button>    
                            <a href="{{ route('delete.datakelas', $datakelass->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>
@endsection

@push('js')
<script>
    //Edit
    $(function(){
        $(document).on('click','#btn-edit-kelas', function(){
            let id = $(this).data('id');
            // alert(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: "{{url('datakelas/edit')}}/"+id,
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    // $('#edit-name').val(res.name);
                    $('#edit-id').val(res.id);
                    $('#edit-nama').val(res.nama_kelas);
                    $('#edit-wali_id').val(res.notlpn);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush