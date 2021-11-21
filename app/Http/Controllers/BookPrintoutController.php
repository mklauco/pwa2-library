<?php

namespace App\Http\Controllers;

use App\Models\BookPrintout;
use Illuminate\Http\Request;
use App\Models\Books;

class BookPrintoutController extends Controller
{
    public function index()
    {
        //
        $printouts = BookPrintout::with('book')->get();
        return view('printouts.index')->with('printouts', $printouts);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(BookPrintout $bookPrintout)
    {
        //
    }



    public function edit(BookPrintout $bookPrintout)
    {
        //
    }


    public function update(Request $request, BookPrintout $bookPrintout)
    {
        //
    }


    public function destroy(BookPrintout $bookPrintout)
    {
        //
    }
}
