@extends('adminlte::page')

@section('title', 'Mata Pelajaran')

@section('content_header')
    <h1 class="m-0 text-dark">Input Mata Pelajaran</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
             Input Mata Pelajaran</button>
             <table id="table-data" class="table table-bordered">
                <thead>
                    {{--Mata Pelajaran--}}
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

        
                    <form id="matapelajaran" name="matapelajaran" method="post" action="{{route('create.matapelajaran')}}" enctype="multipart/form-data">
                    @csrf
                    <h5>Mata Pelajaran</h5>
                    <div class="form-group">
                            <label for="id_mapel">ID Mapel</label>
                            <input type="text" class="form-control" name="id_mapel" id="id_mapel" required/>
                        </div>
                        <div class="form-group">
                            <label for="namamapel">Nama Mapel</label>
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


<!-- Mata Pelajaran -->
<div class="card-body">
            <h3>Mata Pelajaran</h3>
            <table class="table table-bordered text-center justify-content-center">
                <thead>
                    <th>ID Mapel</th>
                    <th>Nama Mapel</th>
                    <th>Aksi</th>
            </thead>
            <tbody>
            @php $no=1; @endphp
                    @foreach($matapelajaran as $matapelajarans)
                        <tr>
                            <td>{{$matapelajarans->id_mapel}}</td>
                            <td>{{$matapelajarans->namamapel}}</td>
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
                data: $('#matapelajaran').serialize(),
                url: "{{ route('matapelajaran')}}",
                type: "POST",
                dataType: 'json',
                success: function(data){

                    $('#matapelajaran').trigger("reset");
                    $('#matapelajaranModal').modal('hide');
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