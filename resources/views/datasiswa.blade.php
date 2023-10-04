@extends('adminlte::page')

@section('title', 'Data Siswa')

@section('content_header')
    <h1 class="m-0 text-dark">Input Data Siswa</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
             Input Data Siswa</button>
             <table id="table-data" class="table table-bordered">
                <thead>
                    {{--Data Siswa--}}
                </thead>
            </table>
            </div>

            <!--modal--> 
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            
            <div class="modal-body">
                <form id="datasiswa" name="datasiswa" method="post" action="{{route('create.store')}}" enctype="multipart/form-data">
                    @csrf
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
                            <label for="notlpn">No Telepon</label>
                            <input type="text" class="form-control" name="notlpn" id="notlpn" required/>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select name="jeniskelamin" class="form-control"
                                id="jeniskelamin">
                                <option value=""></option>
                                <option value="laki-laki">Laki - Laki</option>
                                <option value="perempuan">Perempuan</option>
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

<!-- Data Siswa -->
<div class="card-body">
            <h3>Data Siswa</h3>
            <table class="table table-bordered text-center justify-content-center">
                <thead>
                    <th >NISN</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                @php $no=1; @endphp
                    @foreach($datasiswa as $datasiswas)
                        <tr>
                            <td>{{$datasiswas->NISN}}</td>
                            <td>{{$datasiswas->nama}}</td>
                            <td>{{$datasiswas->tempat_lahir}}</td>
                            <td>{{$datasiswas->tanggal_lahir}}</td>
                            <td>{{$datasiswas->alamat}}</td>
                            <td>{{$datasiswas->notlpn}}</td>
                            <td>{{$datasiswas->jeniskelamin}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic exxample">
                                    <button type="button" class="btn btn-secondary">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" >
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        $(function() {})

        $('#saveBtn').click(function(e){
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#datasiswa').serialize(),
                url: "{{ route('datasiswa')}}",
                type: "POST",
                dataType: 'json',
                success: function(data){

                    $('#datasiswa').trigger("reset");
                    $('#datasiswaModal').modal('hide');
                },
                error: function(data){
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
            location.reload();
        });
        </script>
        @endpush