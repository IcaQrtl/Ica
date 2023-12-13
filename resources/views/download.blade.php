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
        <div class="card-body">
            @foreach($files as $file)
                <p>{{ $file->file }}</p>
                <a href="{{ route('file.download', ['filename' => $file->file]) }}" class="btn btn-primary" download>Download</a>
            @endforeach
        </div>
    </div>
</div>

@endsection

@push('js')
<script>

</script>
@endpush