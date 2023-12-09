@extends('adminlte::page')

@section('title', 'Data Nilai')

@section('content_header')
    <h1 class="m-0 text-dark">Input Data Absen</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">

    </div>

<!-- Data Kelas -->
<div class="card-body">
    <h3>Data Kelas</h3>
    <table class="table table-bordered text-center justify-content-center">
        <thead>
            <th>No</th>
            <th>NISN</th>
            <th>Mata Pelajaran</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Izin</th>
            <th>Alpha</th>
            <th>Total</th>
            <th>Penilai</th>
            <th>Aksi</th>
        </thead>
        <tbody>
        @php $no=1; @endphp
            @foreach($absen as $absens)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$absens->NISN}}</td>
                    <td>{{$absens->mata_pelajaran}}</td>
                    <td>{{$absens->hadir}}</td>
                    <td>{{$absens->sakit}}</td>
                    <td>{{$absens->ijin}}</td>
                    <td>{{$absens->alpha}}</td>
                    <td>{{$absens->total}}</td>
                    <td>{{$absens->created_by}}</td>
                    <td>
                        <button type="button" id="btn-edit-absen" class="btn btn-success" data-toggle="modal" data-target="#EditAbsen" data-id="{{ $absens->id }}">Edit</button>    
                        <a href="{{ route('delete.dataabsen', $absens->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!--modal-->
<div class="modal fade" id="EditAbsen" tabindex="-1" role="dialog" aria-labelledby="EditAbsenLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="EditAbsenLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
                <form id="dataabsen" name="dataabsen" method="post" action="{{route('update.dataabsen')}}" enctype="multipart/form-data">
                    @csrf
                    <h5>Data Absen</h5>
                    
                    <div class="form-group">
                        <label for="hadir">Hadir</label>
                        <input type="text" class="form-control" name="hadir" id="edit-hadir" required/>
                    </div>
                    <div class="form-group">
                        <label for="sakit">Sakit</label>
                        <input type="text" class="form-control" name="sakit" id="edit-sakit" required/>
                    </div>
                    <div class="form-group">
                        <label for="ijin">Izin</label>
                        <input type="text" class="form-control" name="ijin" id="edit-ijin" required/>
                    </div>
                    <div class="form-group">
                        <label for="alpha">Alpha</label>
                        <input type="text" class="form-control" name="alpha" id="edit-alpha" required/>
                    </div>

                    <input type="hidden" class="form-control" name="id" id="edit-id" required/>
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
        $(document).on('click','#btn-edit-absen', function(){
            let id = $(this).data('id');
            // alert(id);
            // console.log(id);
            $.ajax({
                type: "get",
                url: "{{url('dataabsen/edit')}}/"+id,
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    // $('#edit-name').val(res.name);
                    $('#edit-id').val(res.id);
                    $('#edit-hadir').val(res.hadir);
                    $('#edit-sakit').val(res.sakit);
                    $('#edit-ijin').val(res.ijin);
                    $('#edit-alpha').val(res.alpha);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush