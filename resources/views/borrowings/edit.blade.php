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
                <h2>Edit Peminjaman</h2>
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
        
    <form action="{{ route('borrowings.update',$borrowing->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIS</strong>
                    <select class="form-control" name="nis">
                        <option value="{{$borrowing->nis}}"selected>-{{$borrowing->nis}}-</option>
                        @foreach($students as $student)
                        <option value="{{$student->nis}}">{{$student->nis}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Peminjam</strong>
                    <select class="form-control" name="nama_peminjam">
                        <option value="{{$borrowing->nama_peminjam}}"selected>-{{$borrowing->nama_peminjam}}-</option>
                        @foreach($students as $student)
                        <option value="{{$student->nama}}">{{$student->nama}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rayon</strong>
                    <select class="form-control" name="rayon">
                        <option value="{{$borrowing->rayon}}"selected>-{{$borrowing->rayon}}-</option>
                        @foreach($rayons as $rayon)
                        <option value="{{$rayon->nama_rayon}}">{{$rayon->nama_rayon}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rombel</strong>
                <select class="form-control" name="rombel">
                    <option value="{{$borrowing->rombel}}"selected>-{{$borrowing->rombel}}-</option>
                    @foreach($rombels as $rombel)
                    <option value="{{$rombel->nama_rombel}}">{{$rombel->nama_rombel}}</option>
                    @endforeach
                    </select>            
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul buku</strong>
                    <select class="form-control" name="judul_buku">
                        <option value="{{$borrowing->judul_buku}}"selected>-{{$borrowing->judul_buku}}-</option>
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
                    <input type="date" value="<?php echo $tomorrow; ?>" class="form-control" id="date" name="tgl_kembali">
                </div>
            </div>
                    <input type="hidden" value="{{ Auth::user()->name }}" name="petugas" class="form-control" placeholder="Nama Petugas"> 
                    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select class="form-control" name="status">
                        <option value="{{$borrowing->status}}"selected>-{{$borrowing->status}}-</option>
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Dikembalikan">Dikembalikan</option>
                        <option value="Diperpanjang">Diperpanjang</option>
                    </select>     
                </div>
            </div>  
   
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
