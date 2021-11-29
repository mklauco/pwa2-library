<?php

namespace App\Http\Controllers;

use App\Models\BookPrintout;
use Illuminate\Http\Request;
use App\Models\Books;

use Illuminate\Validation\Rule;

use Session;

class BookPrintoutController extends Controller
{
  public function index()
  {

    $printouts = BookPrintout::with('book')->orderBy('book_id', 'asc')->get();
    return view('printouts.index')->with('printouts', $printouts);
  }
  
  
  public function create()
  {
    return view('printouts.create')->with('create', true)->with('bookList', $this->bookList());
  }
  
  
  public function store(Request $request)
  {

    $v = [
      'book_id'     => ['required', Rule::in($this->bookIds())],
      'obtained_at' => ['required', 'date'],
    ];
    $validated = $request->validate($v);

    try {
      BookPrintout::create($request->all());
      Session::flash('success', __('printouts.saved'));
      return redirect('printouts');
    } catch (\Exception $e) {
      Session::flash('failure', $e->getMessage());
      return redirect()->back()->withInput();
    }
  }
  
  
  public function show(BookPrintout $bookPrintout)
  {

  }
  
  
  
  public function edit($id)
  {
    return view('printouts.create')
    ->with('create', false)
    ->with('bookList', $this->bookList())
    ->with('printouts', BookPrintout::find($id));
  }
  
  
  public function update(Request $request, $id)
  {
    $v = [
      'book_id'     => ['required', Rule::in($this->bookIds())],
      'obtained_at' => ['required', 'date'],
    ];
    $validated = $request->validate($v);

    try {
      BookPrintout::find($id)->update($request->all());
      Session::flash('success', __('printouts.saved'));
      return redirect('printouts');
    } catch (\Exception $e) {
      Session::flash('failure', $e->getMessage());
      return redirect()->back()->withInput();
    }
  }
  
  
  public function destroy($id)
  {
    BookPrintout::find($id)->delete();
    Session::flash('success', __('printouts.deleted'));
    return redirect('printouts');
  }
}
