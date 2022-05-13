@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Buku</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul Buku</strong>
                    <input type="text" name="judul_buku" class="form-control" placeholder="Judul" value="{{ $book->judul_buku }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Buku</strong><br>
                    <input type="radio" @if($book->jenis_buku == "Fiksi") {{ __('checked') }} @endif id="fiksi" name="jenis_buku" value="Fiksi">
                    <label for="fiksi">Fiksi</label><br>
                    <input type="radio" @if($book->jenis_buku == "Non-Fiksi") {{ __('checked') }} @endif id="non-fiksi" name="jenis_buku" value="Non-Fiksi">
                    <label for="non-fiksi">Non-Fiksi</label><br>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Penerbit</strong>
                    <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="{{ $book->penerbit }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pengarang</strong>
                    <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" value="{{ $book->pengarang }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>   
    </form>
@endsection