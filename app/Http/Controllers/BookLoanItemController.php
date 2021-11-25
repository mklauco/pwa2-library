<?php

namespace App\Http\Controllers;

use App\Models\BookLoanItem;
use Illuminate\Http\Request;

use Carbon\Carbon;

class BookLoanItemController extends Controller
{
  
  public function index()
  {
    //
    $loans = BookLoanItem::with('book', 'user', 'loan')->get();
// dd($loans);
    $loan_length = [];
    foreach ($loans as $b){
      $loaned_at = Carbon::parse($b->loan->loaned_at);
      $returned_at = Carbon::parse($b->returned_at);
      $loan_length[$b->id] = 
      ($returned_at->diff($loaned_at)->days < 1) ? 'today' : $returned_at->diff($loaned_at)->days;
    }


// dd($loans);
    return view('loans.index')->with('loans', $loans)->with('loan_length', $loan_length);
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
