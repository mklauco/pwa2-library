<?php

namespace App\Http\Controllers;

use App\Models\BookLoanItem;
use App\Models\BookLoan;
use Illuminate\Http\Request;

use Carbon\Carbon;

use Auth;
use Session;

class BookLoanItemController extends Controller
{
  
  public function index()
  {
    
    $loans = BookLoanItem::with('book', 'user', 'loan')->orderBy('book_loan_id', 'desc')->get();
    
    
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
    return view('loans.create')->with('create', true)->with('availableBookList', $this->availableBookList());
  }
  
  
  public function store(Request $request)
  {
    $v = [
      'book_printout_id'    => 'required',
      'loaned_at'           => 'required|date',
    ];
    $validated = $request->validate($v);
    
    try {
      
      $bookLoan = New BookLoan;
      $bookLoan->user_id   = Auth::id();
      $bookLoan->loaned_at = $request->loaned_at;
      $bookLoan->save();
      
      $bookLoanItem = New BookLoanItem;
      $bookLoanItem->book_printout_id = $request->book_printout_id;
      $bookLoanItem->book_loan_id = $bookLoan->id;
      $bookLoanItem->save();
      
      Session::flash('success', __('loans.saved'));
      return redirect('loans');
    } catch (\Exception $e) {
      Session::flash('failure', $e->getMessage());
      return redirect()->back()->withInput();
    }
  }
  
  
  public function show(BookLoanItem $bookLoanItem)
  {
  }
  
  
  public function edit($id)
  {
    $loans = BookLoanItem::with('book')->find($id);
    return view('loans.create')->with('create', false)->with('loans', $loans)->with('availableBookList', $this->availableBookList());
  }
  
  
  public function update(Request $request, $id)
  {
    $v = [
      // 'book_printout_id'    => 'required',
      'returned_at'         => 'required|date',
    ];
    $validated = $request->validate($v);

    $b = BookLoanItem::find($id);
    $b->returned_at = $request->returned_at;

    try {
      $b->save();
      Session::flash('success', __('loans.saved'));
      return redirect('loans');
    } catch (\Exception $e) {
      Session::flash('failure', $e->getMessage());
      return redirect()->back()->withInput();
    }
  }
  
  
  public function destroy(BookLoanItem $bookLoanItem)
  {
    return '<h1>delete not working :)</h1>';
  }
}
