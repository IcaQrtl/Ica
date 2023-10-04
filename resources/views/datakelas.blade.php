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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
             Input Data Kelas</button>
             <table id="table-data" class="table table-bordered">
                <thead>
                    {{--Data Kelas--}}
                </thead>
            </table>
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
                <form id="datakelas" name="datakelas" method="post" action="{{route('create.store')}}" enctype="multipart/form-data">
                    @csrf
                    <h5>Data Kelas</h5>
                    <div class="form-group">
                            <label for="IDkelas">ID Kelas</label>
                            <input type="text" class="form-control" name="IDkelas" id="IDkelas" required/>
                        </div>
                    <div class="form-group">
                            <label for="namakelas">Nama Kelas</label>
                            <input type="text" class="form-control" name="namakelas" id="namakelas" required/>
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

<!-- Data Kelas -->
<div class="card-body">
            <h3>Data Kelas</h3>
            <table class="table table-bordered text-center justify-content-center">
                <thead>
                    <th>ID Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                @php $no=1; @endphp
                    @foreach($datakelas as $datakelass)
                        <tr>
                            <td>{{$datakelass->IDkelas}}</td>
                            <td>{{$datakelass->namakelas}}</td>
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

@endsection

@push('js')
    <script>
        $(function() {})

        $('#saveBtn').click(function(e){
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#datakelas').serialize(),
                url: "{{ route('datakelas')}}",
                type: "POST",
                dataType: 'json',
                success: function(data){

                    $('#datakelas').trigger("reset");
                    $('#datakelasModal').modal('hide');
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