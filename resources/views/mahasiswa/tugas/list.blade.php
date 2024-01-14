@extends('layouts.admin')

@section('title', 'List Tugas')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tugas</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    
        <div class="row">
            @foreach ($dosen as $dose)
                @foreach ($dose->tugas()->get() as $tugas)    
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a style="text-decoration: none;" href="{{ route('tugas.detail', $tugas->id) }}">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tugas->judul }}</div>
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Dosen : {{ $dose->name }}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                @endforeach
            @endforeach
        </div>

</div>

@endsection