@extends('layouts.admin')

@section('title', 'Data Tugas')

@section('content')

<div class="container">
    <a href="{{ route('tugas.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul">
                </div>
                @error('judul')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="hidden" id="deskripsi" name="deskripsi">
                    <trix-editor input="deskripsi"></trix-editor>
                </div>
                @error('deskripsi')
                <small style="color:red">{{ $message }}</small>
                @enderror
                    <input type="hidden" class="form-control" name="user_id" placeholder="user_id" value="{{ auth()->user()->id }}">
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">submit</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection