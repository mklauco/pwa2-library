<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use Illuminate\Http\Request;

class BookLoanController extends Controller
{
  
  public function index()
  {
    //
    $loans = BookLoan::with('user', 'bookLoanItems')->orderBy('loan_id', 'desc')->get();
    return view('loans.index')->with('loans', $loans);
    
  }
  
  
  public function create()
  {
    return view('loans.create')->with('create', true)->with('availableBookList', $this->availableBookList());
  }
  
  
  public function store(Request $request)
  {
    //
  }
  
  
  public function show(BookLoan $bookLoan)
  {
    //
  }
  
  
  public function edit(BookLoan $bookLoan)
  {
    //
  }
  
  
  public function update(Request $request, BookLoan $bookLoan)
  {
    //
  }
  
  
  public function destroy(BookLoan $bookLoan)
  {
    //
  }
}
