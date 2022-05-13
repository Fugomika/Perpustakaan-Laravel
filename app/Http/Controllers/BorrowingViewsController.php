<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewUserData;
use App\Models\BorrowingViews;


class BorrowingViewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowingview = BorrowingViews::latest()->paginate(0);

        return view('borrowingsview.index')
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }
}