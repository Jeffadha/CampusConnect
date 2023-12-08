@extends('layouts.admin')

@section('title', 'Detail Pengumuman')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengumuman </h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <center>

                <h2>{{ $pengumuman->judul }}</h2>
                <img class="my-5" src="/image_pengumuman/{{ $pengumuman->gambar }}" alt="image">
            </center>
                <div class="mx-3">
                    {!! $pengumuman->deskripsi !!}
                </div>
        </div>
    </div>

</div>

@endsection