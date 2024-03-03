@extends('adminlte::page')

@section('title', 'Data Akun')

@section('content_header')
    <h1 class="m-0 text-dark">Data Akun</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
            {{-- <div class="row justify-content-end">
                <button type="button" class="btn btn-info m-1" data-toggle="modal" data-target="#TambahAkun"> Import Siswa </button>
                <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#TambahAkun"> Tambah Data Akun </button>
            </div> --}}
            <br>
            <!-- Data Akun -->
                <table class="table table-bordered text-center justify-content-center" id="table-data">
                    <thead>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                        @foreach($dataakun as $value)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$value->username}}</td>
                                <td>{{$value->name}}</td>
                                <td>
                                    @if($value->role_id == 1)
                                        Admin
                                    @elseif($value->role_id == 2)
                                        Guru
                                    @elseif($value->role_id == 3)
                                        Siswa
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-akun" class="btn btn-success" data-toggle="modal" data-target="#EditAkun" data-id="{{ $value->id }}">Edit</button>    
                                        <a href="{{ route('delete.dataakun', $value->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>

<!--modal tambah-->
<div class="modal fade" id="TambahAkun" tabindex="-1" role="dialog" aria-labelledby="TambahAkunLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="TambahAkunLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
                <form id="datakaun" name="datakaun" method="post" action="{{route('create.dataakun')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="role_id">Pilih Akun</label>
                        <select name="role_id" class="form-control" id="role_id">
                            <option value="0">--Jenis Akun--</option>
                            <option value="2"> Guru </option>
                            <option value="3"> Siswa</option>
                        </select> 
                    </div>
                    
                    <div id="form-akun">
                        <h5>Data Akun</h5>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" name="name" id="name" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required/>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control" name="password" id="password" required/>
                        </div>
                    </div>

                    <div id="form-main">
                        
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

<!--modal edit-->
<div class="modal fade" id="EditAkun" tabindex="-1" role="dialog" aria-labelledby="EditAkunLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="EditAkunLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
                <form id="datakaun" name="datakaun" method="post" action="{{route('update.dataakun')}}" enctype="multipart/form-data">
                    @csrf
                    
                    <div id="form-akun">
                        <h5>Data Akun</h5>
                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" class="form-control" name="username" id="edit-username" required/>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="edit-name" required/>
                        </div>
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



@endsection

@push('js')
<script>


    //Form Main
    $(document).ready(function () {
        $('#role_id').change(function () {
            var jenisakun = $(this).val();
            var myForm = $("#form-main");

            if(jenisakun === "0"){
                myForm.empty();
            }else if(jenisakun === "2"){
                myForm.html(`
                <h5>Data Guru</h5>
                <div class="form-group">
                    <label for="nilai">NIP</label>
                    <input type="text" class="form-control" name="NIP" id="NIP" required/>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required/>
                </div>
                <div class="form-group">
                    <label for="jeniskelamin">Pilih Jenis Kelamin</label>
                    <select name="jeniskelamin" class="form-control" id="jeniskelamin">
                        <option value="">--Jenis Kelamin--</option>
                        <option value="laki-laki"> Laki-Laki </option>
                        <option value="perempuan"> Perempuan </option>
                    </select> 
                </div>
                <div class="form-group">
                    <label for="notlpn">No Telp</label>
                    <input type="text" class="form-control" name="notlpn" id="notlpn" required/>
                    </div>
                `);
            }
            else if(jenisakun === "3"){
                myForm.html(`
                <h5>Data Siswa</h5>
                <div class="form-group">
                    <label for="NISN">NISN</label>
                    <input type="text" class="form-control" name="NISN" id="NISN" required/>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required/>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required/>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required/>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" required/>
                </div>
                <div class="form-group">
                    <label for="notlpn">No Telp</label>
                    <input type="text" class="form-control" name="notlpn" id="notlpn" required/>
                </div>
                <div class="form-group">
                    <label for="jeniskelamin">Pilih Jenis Kelamin</label>
                    <select name="jeniskelamin" class="form-control" id="jeniskelamin">
                        <option value="">--Jenis Kelamin--</option>
                        <option value="laki-laki"> Laki-Laki </option>
                        <option value="perempuan"> Perempuan </option>
                    </select> 
                </div>
                <div class="form-group">
                    <label for="kelas_id">Pilih Kelas</label>
                    <select name="kelas_id" class="form-control" id="kelas_id">
                        <option value="">--Kelas--</option>
                        @foreach($kelas as $value)
                            <option value="{{ $value->id }}"> {{ $value->nama_kelas }} </option>
                        @endforeach
                    </select> 
                </div>
                `);
            }
        });
    });

    //Edit
    $(function(){
        $(document).on('click','#btn-edit-akun', function(){
            let id = $(this).data('id');
            // alert(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: "{{url('dataakun/edit')}}/"+id,
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    // $('#edit-name').val(res.name);
                    $('#edit-id').val(res.id);
                    $('#edit-username').val(res.username);
                    $('#edit-name').val(res.name);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>
@endpush