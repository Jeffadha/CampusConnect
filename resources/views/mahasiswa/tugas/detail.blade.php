@extends('layouts.admin')

@section('title', 'Detail Tugas')

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
                                    @if ($jawaban->isEmpty())
                                    <hr>
                                    <form action="{{ route('jawaban.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="form-group">
                                            <label for="deskripsi">deskripsi</label>
                                            <input type="hidden" id="deskripsi" name="deskripsi">
                                            <trix-editor input="deskripsi"></trix-editor>
                                        </div>
                                        @error('deskripsi')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror
                                        <div class="form-group">
                                            <label for="file">file</label>
                                            <input type="file" class="form-control" name="file">
                                        </div>
                                        @error('file')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-block">Jawab</button>
                                        </div>
                                    </form>    
                                    @else    
                                    <hr>
                                    <h3>Jawaban</h3>
                                    @foreach ($jawaban as $jawab)    
                                    <p>{!! $jawab->deskripsi !!}</p>
                                        @if ( $jawab->file)    
                                            <a href="{{ URL::asset('dokumen_jawaban/'.$jawab->file) }}" download="{{ $jawab->file }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> {{ $jawab->file }}</a>
                                        @endif
                                        <h5>Nilai : {{ $jawab->nilai }}</h>
                                        <div class="d-flex">
                                            <form action="{{  route('jawaban.destroy', $jawab->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <div class="m-2">
                                                <a href="{{ route('jawaban.edit', $jawab->id) }}" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg></a> 
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
        </div>

</div>

@endsection