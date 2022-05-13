<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Student;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowings = Borrowing::latest()->paginate(10);

        return view('borrowings.index',compact('borrowings'))
        ->with('i', (request()->input('page', 1) - 1) * 10  );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rayons = Rayon::all();
        $rombels = Rombel::all(); 
        $students = Student::all();
        $books = Book::all();
        return view('borrowings.create',compact('rayons','rombels','students','books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis'=>'required',
            'nama_peminjam'=>'required',
            'rombel'=>'required',
            'rayon'=>'required',
            'judul_buku'=>'required',
            'tgl_pinjam'=>'required',
            'tgl_kembali'=>'required',
            'petugas'=>'required',
            'status'=>'required'
        ]);

        Borrowing::create($request->all());
        return redirect()->route('borrowings.index')
                        ->with('success','Berhasil Menyimpan !');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function show(Borrowing $borrowing)
    {
        
        return view('borrowings.show',compact('borrowing'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrowing $borrowing)
    {
        $rayons = Rayon::all();
        $students = Student::all();
        $rombels = Rombel::all();
        $books = Book::all();
        $borrowings = Borrowing::all();
        return view('borrowings.edit',compact('borrowing',$borrowings,'books',$books,'students',$students,'rayons',$rayons,'rombels',$rombels));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'nis'=>'required',
            'nama_peminjam'=>'required',
            'rombel'=>'required',
            'rayon'=>'required',
            'judul_buku'=>'required',
            'tgl_pinjam'=>'required',
            'tgl_kembali'=>'required',
            'petugas'=>'required',
            'status'=>'required'
        ]);

        $borrowing->update($request->all());
        return redirect()->route('borrowings.index')
                        ->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();
     
        return redirect()->route('borrowings.index')
                        ->with('success','Berhasil Hapus !');
    }
}
