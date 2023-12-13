@extends('adminlte::page')

@section('title', 'Data Siswa')

@section('content_header')
    
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">
        
    </div>
</div>

<!--modal edit-->
<div class="modal fade" id="EditSiswa" tabindex="-1" role="dialog" aria-labelledby="EditSiswaLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="EditSiswaLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="datasiswa" name="datasiswa" method="post" action="{{route('update.datasiswa')}}" enctype="multipart/form-data">
                @csrf
                
                <h5>Data Siswa</h5>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="edit-nama" required/>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" id="edit-tempat_lahir" required/>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="edit-tanggal_lahir" required/>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="edit-alamat" required/>
                </div>
                <div class="form-group">
                    <label for="notlpn">No Telp</label>
                    <input type="text" class="form-control" name="notlpn" id="edit-notlpn" required/>
                </div>
                <div class="form-group">
                    <label for="jeniskelamin">Pilih Jenis Kelamin</label>
                    <select name="jeniskelamin" class="form-control" id="edit-jeniskelamin">
                        <option value="">--Jenis Kelamin--</option>
                        <option value="laki-laki"> Laki-Laki </option>
                        <option value="perempuan"> Perempuan </option>
                    </select> 
                </div>
                <div class="form-group">
                    <label for="kelas_id">Pilih Kelas</label>
                    <select name="kelas_id" class="form-control" id="edit-kelas_id">
                        <option value="">--Kelas--</option>
                        @foreach($kelas as $value)
                            <option value="{{ $value->id }}"> {{ $value->nama_kelas }} </option>
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

<!-- Data Siswa -->
<div class="card-body">
            <h3>Data Siswa</h3>
            <table class="table table-bordered text-center justify-content-center">
                <thead>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
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
                            <td>{{$datasiswas->kelas}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" id="btn-edit-siswa" class="btn btn-success" data-toggle="modal" data-target="#EditSiswa" data-id="{{ $datasiswas->id }}">Edit</button>    
                                    <a href="{{ route('delete.datasiswa', $datasiswas->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
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
    //Edit
    $(function(){
        $(document).on('click','#btn-edit-siswa', function(){
            let id = $(this).data('id');
            // alert(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: "{{url('datasiswa/edit')}}/"+id,
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    // $('#edit-name').val(res.name);
                    $('#edit-id').val(res.id);
                    $('#edit-nama').val(res.nama);
                    $('#edit-tempat_lahir').val(res.tempat_lahir);
                    $('#edit-tanggal_lahir').val(res.tanggal_lahir);
                    $('#edit-alamat').val(res.alamat);
                    $('#edit-notlpn').val(res.notlpn);
                    $('#edit-jeniskelamin option[value="'+res.jeniskelamin+'"]').attr("selected", "selected");
                    $('#edit-kelas_id option[value="'+res.kelas_id+'"]').attr("selected", "selected");
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush