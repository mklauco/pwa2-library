<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Books;

use Illuminate\Support\Facades\Mail;
use App\Mail\BookAdded;

use Session;

class BooksController extends Controller
{
  public function index()
  {
    //
    $books = Books::with('printouts')->join('authors', 'books.author', '=', 'authors.id')->select([
    'books.*',
    'authors.first_name AS author_first_name',
    'authors.last_name AS last_first_name',
      ])->paginate(10);
    return view('books.index')->with('books', $books);
    
  }
  
  public function create()
  {
    return view('books.create')->with('authorList', $this->authorList());
  }

  public function store(Request $request)
  {
    //
    $v = [
      'name'          => 'required',
      'genre'         => 'required',
      'description'   => 'required',
      'author'        => 'required|numeric',
    ];
    $validated = $request->validate($v);
    try {
      $b = Books::create($request->all());
      $emailAddress = 'martin.klauco@gmail.com';
      $data['bookTitle'] = $request->name;
      $data['editRoute'] = route('books.edit', $b->id);
      Mail::to($emailAddress)->send(new BookAdded($data));
      Session::flash('success', __('books.saved'));
      return redirect('books');
    } catch (\Exception $e) {
      Session::flash('failure', $e->getMessage());
      return redirect()->back()->withInput();
    }
  }
  
  
  public function show($id)
  {
    //
  }
  
  public function edit($id)
  {
    //
    $books = Books::find($id);
    return view('books.edit')->with('books', $books)->with('authorList', $this->authorList());
  }
  
  public function update(Request $request, $id)
  {
    //
    $v = [
      'name'          => 'required',
      'genre'         => 'required',
      'description'   => 'required',
      'author'        => 'required|numeric',
    ];
    $validated = $request->validate($v);
    
    try {
      Books::find($id)->update($request->all());
      Session::flash('success', __('books.updated'));
      return redirect('books');
    } catch (Exception $e) {
      Session::flash('failure', $e->getMessage());
      return redirect()->back()->withInput();
    }
  }
  
  
  public function destroy($id)
  {
    //
    Books::find($id)->delete();
    Session::flash('success', __('books.deleted'));
    return redirect('books');
  }
}
