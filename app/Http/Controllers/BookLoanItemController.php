<?php

namespace App\Http\Controllers;

use App\Models\BookLoanItem;
use App\Models\BookLoan;
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

        $share['loanCount']    = $loans->count();
        $share['earliestLoan'] = BookLoan::orderBy('loaned_at', 'asc')->first()->value('loaned_at');
        $share['latestReturn'] = BookLoanItem::whereNotNull('returned_at')->orderBy('returned_at', 'desc')->first()->value('returned_at');
        $share['highestLoanCount'] = BookLoanItem::withCount('loan')->orderBy('loan_count', 'desc')->first()->book->name;
        $share['userHighestCount'] = BookLoanItem::withCount('user')->orderBy('user_count', 'desc')->first()->user->last_name;

        $loanLength = [];
        $loanLength30 = 0;
        foreach ($loans as $b){
            $loaned_at   = Carbon::parse($b->loan->loaned_at);
            $returned_at = Carbon::parse($b->returned_at);
            $loanLength[$b->id] = $returned_at->diff($loaned_at)->days;
            if ($loanLength[$b->id] >= 30) {
                $loanLength30++;
            }
        }
        $share['loanLength30'] = $loanLength30;

        return view('loans.index')->with('loans', $loans)->with('loanLength', $loanLength)->with('share', $share);
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
