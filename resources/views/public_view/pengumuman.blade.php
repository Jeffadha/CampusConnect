@extends('layouts.admin')

@section('title', 'Data Pengumuman')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengumuman</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    
        <div class="row">
            @foreach ($pengumuman as $pengu)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        {{ date('M d, Y',strtotime($pengu->created_at));  }}
                                    </div>
                                    <a style="text-decoration: none" href="{{ route('pengumuman.detail', $pengu->id_pengumuman) }}">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengu->judul }}</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            @endforeach
        </div>

</div>

@endsection