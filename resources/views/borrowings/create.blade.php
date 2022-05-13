@extends('layouts.master')
  
<?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
$tomorrow = $year . '-' . $month . '-' . $day + 5;
?>

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Peminjaman</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('borrowings.index') }}"> Back</a>
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
        
    <form action="{{ route('borrowings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIS</strong>
                    <select required class="form-control" name="nis">
                        <option selected value="">-Pilih-</option>
                        @foreach($students as $student)
                        <option value="{{$student->nis}}">{{$student->nis}} - {{$student->nama}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Peminjam</strong>
                    <select required class="form-control" name="nama_peminjam">
                        <option selected value="">-Pilih-</option>
                        @foreach($students as $student)
                        <option value="{{$student->nama}}">{{$student->nama}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rayon</strong>
                    <select required class="form-control" name="rayon">
                        <option selected value="">-Pilih-</option>
                        @foreach($rayons as $rayon)
                        <option value="{{$rayon->nama_rayon}}">{{$rayon->nama_rayon}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rombel</strong>
                    <select required class="form-control" name="rombel">
                        <option selected value="">-Pilih-</option>
                        @foreach($rombels as $rombel)
                        <option value="{{$rombel->nama_rombel}}">{{$rombel->nama_rombel}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul buku</strong>
                    <select required class="form-control" name="judul_buku">
                        <option selected value="">-Pilih-</option>
                        @foreach($books as $book)
                        <option value="{{$book->judul_buku}}">{{$book->judul_buku}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pinjam</strong>
                    <input type="date" readonly="true" value="<?php echo $today; ?>" class="form-control" id="date" name="tgl_pinjam">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Kembali</strong>
                    <input type="date" readonly="true" value="<?php echo $tomorrow; ?>" class="form-control" id="date" name="tgl_kembali">
                </div>
            </div>
                    <input type="hidden" value="{{ Auth::user()->name }}" name="petugas" class="form-control" placeholder="Nama Petugas">
                    <input type="hidden" value="Dipinjam" name="status" class="form-control" placeholder="Status">    

                    
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    @endsection
