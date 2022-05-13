@extends('layouts.master')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table table-bordered">
                    <h1>Selamat datang di Aplikasi Perpus Wisaga </h1>
                    <br>
                    <span>Aplikasi yang digunakan sekolah untuk mengontrol data perpustakaan</span>
                    {{-- <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($borrowings as $borrowing)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $borrowing->name }}</td>
                        <td>{{ $borrowing->detail }}</td>
                        <td>
                            <form action="{{ route('borrowings.destroy',$borrowing->id) }}" method="POST">
                
                                <a class="btn btn-secondary" href="{{ route('borrowings.show',$borrowing->id) }}">Show</a>
                
                                <a class="btn btn-primary" href="{{ route('borrowings.edit',$borrowing->id) }}">Edit</a>
                
                                @csrf
                                @method('DELETE')
                  
                                <button onclick="return confirm('Yakin Menghapus {{  $borrowing->name }} ?')" type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
