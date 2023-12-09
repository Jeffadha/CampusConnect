@extends('layouts.admin')

@section('title', 'Data Jadwal Akademik')

@section('content')

<div class="container">
    <a href="{{ route('akademik.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('akademik.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Judul">
                </div>
                @error('title')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="start">tanggal mulai</label>
                    <input type="date" class="form-control" name="start" placeholder="start">
                </div>
                @error('start')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="end">tanggal selesai</label>
                    <input type="date" class="form-control" name="end" placeholder="end">
                </div>
                @error('end')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="judul">Color</label>
                    <input type="text" class="form-control" name="color" placeholder="Color">
                </div>
                @error('color')
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