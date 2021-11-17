<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Books;
use App\Models\Authors;

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
    // $books = Books::all();
    // $books = Books::join('authors', 'books.author', '=', 'authors.id')->get();
    $books = Books::join('authors', 'books.author', '=', 'authors.id')
    ->select([
      'books.*',
      'first_name', 'last_name',
      // 'authors.first_name AS first_name',
      // 'authors.last_name AS last_name',
      'books.id AS id'
      ])->get();

    return view('books.index')->with('books', $books);
  }
  
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
    return view('books.create')->with('listAuthors', $this->listAuthors());
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
    } catch (\Exception $e) {
      Session::flash('failure', $e->getMessage());
      return redirect()->back()->withInput();
    }
    
  }
  
  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }
  
  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
    $books = Books::find($id);

    return view('books.edit')->with('books', $books)->with('listAuthors', $this->listAuthors());
  }
  
  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
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
    } catch (\Exception $e) {
      Session::flash('failure', $e->getMessage());
      return redirect()->back()->withInput();
    }
  }
  
  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
    Books::find($id)->delete();
    Session::flash('success', __('books.deleted'));
    return redirect('books');
  }
  
}
