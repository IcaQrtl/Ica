@extends('adminlte::page')

@section('title', 'Mata Pelajaran')

@section('content_header')
    <h1 class="m-0 text-dark">Data Mata Pelajaran</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
            <div class="row justify-content-end m-1">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Input Mata Pelajaran</button>
            </div>
            <br>
            <!-- Mata Pelajaran -->
            <table class="table table-bordered text-center justify-content-center" id="table-data">
                <thead>
                    <th>No</th>
                    <th>Nama Mapel</th>
                    <th>Kelas</th>
                    <th>Guru</th>
                    <th>Aksi</th>
                </thead>
            <tbody>
            @php $no=1; @endphp
                    @foreach($matapelajaran as $matapelajarans)
                        <tr>
                            <!-- <td>{{$matapelajarans->id_mapel}}</td> -->
                            <td>{{$no++}}</td>
                            <td>{{$matapelajarans->nama}}</td>
                            <td>{{$matapelajarans->nama_kelas}}</td>
                            <td>{{$matapelajarans->nama_guru}}</td>
                            <td>
                                <button type="button" id="btn-edit-mapel" class="btn btn-success" data-toggle="modal" data-target="#EditMapel" data-id="{{ $matapelajarans->id }}">Edit</button>    
                                <a href="{{ route('delete.matapelajaran', $matapelajarans->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
                <form id="matapelajaran" name="matapelajaran" method="post" action="{{route('create.matapelajaran')}}" enctype="multipart/form-data">
                @csrf
                <h5>Mata Pelajaran</h5>
                <div class="form-group">
                        <label for="id_mapel">ID Mata Pelajaran</label>
                        <input type="text" class="form-control" name="id_mapel" id="id_mapel" required/>
                    </div>
                    <div class="form-group">
                        <label for="namamapel">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" name="namamapel" id="namamapel" required/>
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
<div class="modal fade" id="EditMapel" tabindex="-1" role="dialog" aria-labelledby="EditMapelLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="EditMapelLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
                <form id="matapelajaran" name="matapelajaran" method="post" action="{{route('update.matapelajaran')}}" enctype="multipart/form-data">
                    @csrf
                    
                    <h5>Data Siswa</h5>
                    <div class="form-group">
                        <label for="id">ID Mata Pelajaran</label>
                        <input type="text" class="form-control" name="id" id="edit-id" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" name="nama" id="edit-nama" required/>
                    </div>

                    <!-- <input type="hidden" class="form-control" name="id" id="edit-id"/> -->

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
        $(document).on('click','#btn-edit-mapel', function(){
            let id = $(this).data('id');
            // alert(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: "{{url('matapelajaran/edit')}}/"+id,
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    // $('#edit-name').val(res.name);
                    $('#edit-id').val(res.id);
                    $('#edit-nama').val(res.nama);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush