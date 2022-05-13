@extends('layouts.master')
  
@section('content')
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detail</h2>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIS:</strong>
                {{ $borrowing->nis }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $borrowing->nama_peminjam }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rombel:</strong>
                {{ $borrowing->rombel }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rayon:</strong>
                {{ $borrowing->rayon }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul:</strong>
                {{ $borrowing->judul_buku }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Pinjam:</strong>
                {{ $borrowing->tgl_pinjam }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Kembali:</strong>
                {{ $borrowing->tgl_kembali }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Petugas:</strong>
                {{ $borrowing->petugas }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $borrowing->status }}
            </div>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('borrowings.index') }}"> Back</a>
            <br><br>
        <form action="{{ route('borrowings.destroy',$borrowing->id) }}" method="POST">
           

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $borrowing->nama_peminjam }}?')">Delete</button>
        </form>
        </div>
    </div>
@endsection