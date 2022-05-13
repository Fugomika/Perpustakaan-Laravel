@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
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
     
<form action="{{ route('students.update',$student->nis) }}" method="POST" enctype="multipart/form-data"> 
    @csrf

    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIS</strong>
                <input type="number" min="0" name="nis" class="form-control" placeholder="NIS" value="{{$student->nis}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Siswa</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$student->nama}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Rombel:</strong>
                <select class="form-control" name="rombel">
                    <option value="{{$student->rombel}}"selected>{{$student->rombel}}</option>
                    @foreach($rombels as $rombel)
                    <option value="{{$rombel->nama_rombel}}">{{$rombel->nama_rombel}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Rayon:</strong>
                <select class="form-control" name="rayon">
                    <option value="{{$student->rayon}}"selected>{{$student->rayon}}</option>
                    @foreach($rayons as $rayon)
                    <option value="{{$rayon->nama_rayon}}">{{$rayon->nama_rayon}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Jenis Kelamin:</strong>
                <select class="form-control" name="jk">
                    <option value="{{$student->jk}}"selected>@if($student->jk == 'L'){{"Laki-Laki"}}@else{{"Perempuan"}}@endif</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
        </div>
    </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
     
</form>
@endsection