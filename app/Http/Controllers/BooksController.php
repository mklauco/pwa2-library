<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Books;

use Session;

class BooksController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
    $books = Books::join('authors', 'books.author', '=', 'authors.id')->select(['books.*', 'authors.first_name AS author_first_name', 'authors.last_name AS last_first_name'])->get();
    return view('books.index')->with('books', $books);
  }
  
  public function create()
  {
    //
    return view('books.create');
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
      Books::create($request->all());
      Session::flash('success', __('books.saved'));
      return redirect('books');
    // } catch (\Illuminate\Database\QueryException $e) {
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
    return view('books.edit')->with('books', $books);
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
