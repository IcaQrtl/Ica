@extends('adminlte::page')

@section('title', 'Jadwal')

@section('content_header')
    <h1 class="m-0 text-dark">Jadwal</h1>
@stop

@section('content')
<?php
$params_id = null;
?>

<div class="container-fluid">
    <div class="card card-default">

    </div>

<!--form-->
<div class="modal-body">
    <form id="datakelas" name="datakelas" method="post" action="{{route('create.jadwal')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="jadwal">Berkas jadwal</label>
            <input type="file" class="form-control rounded" id="jadwal" name="jadwal">
        </div>

        <input type="hidden" class="form-control rounded" id="id" name="id" value="{{ optional($jadwal)->id }}">
        <input type="hidden" class="form-control rounded" id="old-jadwal" name="old-jadwal" value="{{ optional($jadwal)->file }}">

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
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