@extends('layouts.admin')

@section('title', 'Data Jawaban')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jawaban Tables</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>nama</th>
                            <th colspan="2">jawaban</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>nama</th>
                            <th colspan="2">jawaban</th>
                            <th>Nilai</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $i = 1;   
                        @endphp
                        @foreach ($tugas as $jawaban)
                        <tr>
                            {{-- @dd($jawaban) --}}
                            <td>{{ $i++ }}</td>
                            <td>{{ $jawaban->name }}</td>
                            <td >
                                <div style="max-height: 100px; overflow: auto;">
                                    {!! $jawaban->deskripsi !!}</td>
                                </div>
                            @if ( $jawaban->file)    
                            <td>
                                <a href="{{ URL::asset('dokumen_jawaban/'.$jawaban->file) }}" download="{{ $jawaban->file }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> {{ $jawaban->file }}</a>
                            </td>
                            @else
                            <td>
                                tidak ada dokumen
                            </td>
                            @endif
                            <td>
                                <h3>{{ $jawaban->nilai }}</h3>
                                <form name="{{$jawaban->id}}" action="{{ route('jawaban.nilai',$jawaban->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id_{{ $jawaban->id }}" value="{{ $jawaban->id }}">
                                    @error("id_{{ $jawaban->id }}")
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                    <input type="text" name="nilai_{{ $jawaban->id }}" class="m-1">
                                    @error("nilai_{{ $jawaban->id }}")
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                    <button type="submit" class="btn btn-success btn-block">Simpan nilai</button>
                                <form>
                            </td>
                        </tr>    
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection