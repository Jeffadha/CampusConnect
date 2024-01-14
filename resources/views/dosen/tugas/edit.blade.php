@extends('layouts.admin')

@section('title', 'Edit Tugas')

@section('content')
{{-- @dd($tugas) --}}
<div class="container">
    <a href="{{ route('tugas.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('tugas.update',['tuga' => $tugas->id]) }}" method="POST" enctype="multipart/form-data"> 
             @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $tugas->judul }}">
                </div>
                @error('judul')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="hidden" id="deskripsi" name="deskripsi">
                    <trix-editor input="deskripsi">{!! $tugas->deskripsi !!}</trix-editor>
                </div>
                @error('deskripsi')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">submit</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection