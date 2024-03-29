@extends('adminlte::page')

@section('title', 'Data Guru')

@section('content_header')
    <h1 class="m-0 text-dark">Data Guru</h1> 
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">

<!-- Modal Tambah -->
<div class="modal fade" id="TambahGuru" tabindex="-1" role="dialog" aria-labelledby="TambahGuruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahGuruLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dataguru" name="dataguru" method="post" action="{{route('create.dataguru')}}" enctype="multipart/form-data">
                    @csrf
                    <h5>Data Guru</h5>
                    <div class="form-group">
                        <label for="NIP">NIP</label>
                        <input type="text" class="form-control" name="NIP" required/>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" required/>
                    </div>
                    <div class="form-group">
                        <label for="jeniskelamin">Pilih Jenis Kelamin</label>
                        <select name="jeniskelamin" class="form-control" >
                            <option value="">--Jenis Kelamin--</option>
                            <option value="Laki-Laki"> Laki-Laki </option>
                            <option value="Perempuan"> Perempuan </option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="notlpn">No Telp</label>
                        <input type="text" class="form-control" name="notlpn" required/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    
<!-- Modal Edit -->
<div class="modal fade" id="EditGuru" tabindex="-1" role="dialog" aria-labelledby="EditGuruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditGuruLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dataguru" name="dataguru" method="post" action="{{route('update.dataguru')}}" enctype="multipart/form-data">
                    @csrf
                    
                    <h5>Data Guru</h5>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="edit-nama" required/>
                    </div>
                    <div class="form-group">
                        <label for="jeniskelamin">Pilih Jenis Kelamin</label>
                        <select name="jeniskelamin" class="form-control" id="edit-jeniskelamin">
                            <option value="">--Jenis Kelamin--</option>
                            <option value="Laki-Laki"> Laki-Laki </option>
                            <option value="Perempuan"> Perempuan </option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="notlpn">No Telp</label>
                        <input type="text" class="form-control" name="notlpn" id="edit-notlpn" required/>
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

<!-- Data Diri -->
<div class="card card-default">
    <div class="card-body">
        <div class="row justify-content-end">
            <button type="button" class="btn btn-info m-1" data-toggle="modal" data-target=""> Import Guru </button>
            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#TambahGuru"> Tambah Data Guru </button>
        </div>
        <br>
        <table class="table table-bordered text-center justify-content-center" id="table-data">
            <thead>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </thead>
            <tbody>
            @php $no=1; @endphp
                @foreach($dataguru as $datagurus)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$datagurus->NIP}}</td>
                        <td>{{$datagurus->nama}}</td>
                        <td>{{$datagurus->jeniskelamin}}</td>
                        <td>{{$datagurus->notlpn}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic exxample">
                                <button type="button" id="btn-edit-guru" class="btn btn-success" data-toggle="modal" data-target="#EditGuru" data-id="{{ $datagurus->id }}">Edit</button>    
                                <a href="{{ route('delete.dataguru', $datagurus->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div>
</div>


@endsection

@push('js')
<script>
    //Edit
    $(function(){
        $(document).on('click','#btn-edit-guru', function(){
            let id = $(this).data('id');
            // alert(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: "{{url('dataguru/edit')}}/"+id,
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    // $('#edit-name').val(res.name);
                    $('#edit-id').val(res.id);
                    $('#edit-nama').val(res.nama);
                    $('#edit-jeniskelamin').val(res.jeniskelamin);
                    $('#edit-notlpn').val(res.notlpn);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush