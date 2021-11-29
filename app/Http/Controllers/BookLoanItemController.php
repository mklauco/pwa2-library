<?php

namespace App\Http\Controllers;

use App\Models\BookLoanItem;
use Illuminate\Http\Request;

use Carbon\Carbon;

class BookLoanItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = BookLoanItem::with('user', 'book', 'loan')->get();

        $loanLength = [];
        foreach ($loans as $b){
            $loaned_at   = Carbon::parse($b->loan->loaned_at);
            $returned_at = Carbon::parse($b->returned_at);
            $loanLength[$b->id] = $returned_at->diff($loaned_at)->days;
        }

        return view('loans.index')->with('loans', $loans)->with('loanLength', $loanLength);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookLoanItem  $bookLoanItem
     * @return \Illuminate\Http\Response
     */
    public function show(BookLoanItem $bookLoanItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookLoanItem  $bookLoanItem
     * @return \Illuminate\Http\Response
     */
    public function edit(BookLoanItem $bookLoanItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookLoanItem  $bookLoanItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookLoanItem $bookLoanItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookLoanItem  $bookLoanItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookLoanItem $bookLoanItem)
    {
        //
    }
}
