@extends('adminlte::page')

@section('title', 'Data Guru')

@section('content_header')
    <h1 class="m-0 text-dark">Input Data Guru</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
             Input Data Guru</button>
             <table id="table-data" class="table table-bordered">
                <thead>
                    {{--Data Guru--}}
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

                    <form id="dataguru" name="dataguru" method="post" action="{{route('create.dataguru')}}" enctype="multipart/form-data">
                    @csrf
                    <h5>Data Guru</h5>
                    <div class="form-group">
                            <label for="NIDN">NIDN</label>
                            <input type="text" class="form-control" name="NIDN" id="NIDN" required/>
                        </div>
                    <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" required/>
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
                        <div class="form-group">
                            <label for="notlpn">No Telepon</label>
                            <input type="text" class="form-control" name="notlpn" id="notlpn" required/>
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

<!-- Data Diri -->
<div class="card-body">
            <h3>Data Guru</h3>
            <table class="table table-bordered text-center justify-content-center">
                <thead>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                @php $no=1; @endphp
                    @foreach($dataguru as $datagurus)
                        <tr>
                            <td>{{$datagurus->NIDN}}</td>
                            <td>{{$datagurus->nama}}</td>
                            <td>{{$datagurus->jeniskelamin}}</td>
                            <td>{{$datagurus->notlpn}}</td>
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
                data: $('#dataguru').serialize(),
                url: "{{ route('dataguru')}}",
                type: "POST",
                dataType: 'json',
                success: function(data){

                    $('#dataguru').trigger("reset");
                    $('#dataguruModal').modal('hide');
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