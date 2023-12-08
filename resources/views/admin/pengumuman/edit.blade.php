@extends('layouts.admin')

@section('title', 'Edit Pengumuman')

@section('content')
<div class="container">
    <a href="{{ route('pengumuman.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('pengumuman.update',$pengumuman->id_pengumuman) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $pengumuman->judul }}">
                </div>
                @error('judul')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="hidden" id="deskripsi" name="deskripsi">
                    <trix-editor input="deskripsi">{!! $pengumuman->deskripsi !!}</trix-editor>
                </div>
                @error('deskripsi')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                @error('gambar')
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