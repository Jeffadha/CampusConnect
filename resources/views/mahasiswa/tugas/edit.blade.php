@extends('layouts.admin')

@section('title', 'Edit Tugas')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tugas</h1>

        <div class="row">   
                <div class="col-12">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $tugas->judul }}</p>
                                    <p class="text-align">{!! $tugas->deskripsi !!}</p>
                                    <hr>
                                    <form action="{{ route('jawaban.update',$jawaban->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="deskripsi">deskripsi</label>
                                            <input type="hidden" id="deskripsi" name="deskripsi">
                                            <trix-editor input="deskripsi">{!! $jawaban->deskripsi !!}</trix-editor>
                                        </div>
                                        @error('deskripsi')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror
                                        <label>file lama</label>
                                        <br>
                                        @if ( $jawaban->file )    
                                        <a href="{{ URL::asset('dokumen_jawaban/'.$jawaban->file) }}" download="{{ $jawaban->file }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> {{ $jawaban->file }}</a>
                                        @endif
                                        <div class="form-group">
                                            <label for="file">file baru</label>
                                            <input type="file" class="form-control" name="file">
                                        </div>
                                        @error('file')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-block">Jawab</button>
                                        </div>
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
        </div>

</div>

@endsection