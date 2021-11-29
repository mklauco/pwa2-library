<?php

namespace App\Http\Controllers;

use App\Models\BookLoanItem;
use App\Models\BookLoan;
use Illuminate\Http\Request;

use Carbon\Carbon;

class BookLoanItemController extends Controller
{
  
  public function index()
  {
    //

    $loans = BookLoanItem::with('book', 'user', 'loan')->get();


    $bookParams['earliestLoan'] = BookLoan::orderBy('loaned_at', 'asc')->first();
    $bookParams['latestReturn'] = BookLoanItem::orderBy('returned_at', 'desc')->first();
    $bookParams['bookHighestCount'] = BookLoanItem::withCount('loan')->orderBy('loan_count', 'desc')->first()->book->name;
    $bookParams['userHighestCount'] = BookLoanItem::withCount('user')->orderBy('user_count', 'desc')->first()->user->last_name;

    $loanLength = [];
    $longerThan30 = 0;
    foreach ($loans as $b){
      $loaned_at = Carbon::parse($b->loan->loaned_at);
      $returned_at = Carbon::parse($b->returned_at);
      $loanLength[$b->id] = 
      ($returned_at->diff($loaned_at)->days < 1) ? 'today' : $returned_at->diff($loaned_at)->days;
      if ($loanLength[$b->id] > 30) {
        $longerThan30++;
      }
    }



    return view('loans.index')
    ->with('loans', $loans)
    ->with('loanLength', $loanLength)
    ->with('longerThan30', $longerThan30)
    ->with('bookParams', $bookParams);
  }
  
  
  public function create()
  {
    //
  }
  
  
  public function store(Request $request)
  {
    //
  }
  
  
  public function show(BookLoanItem $bookLoanItem)
  {
    //
  }
  
  
  public function edit(BookLoanItem $bookLoanItem)
  {
    //
  }
  
  
  public function update(Request $request, BookLoanItem $bookLoanItem)
  {
    //
  }
  
  
  public function destroy(BookLoanItem $bookLoanItem)
  {
    //
  }
}
