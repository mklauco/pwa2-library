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
        $books = Books::withTrashed()->get();
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
        return view('books.create');
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
            'author'        => 'required|numeric|gte:1',
        ];
        $validated = $request->validate($v);
        
        Books::create($request->all());
        Session::flash('success', __('books.saved'));
        return redirect('books'); // redirect to general controller path is crucial after Store/Update paths
        
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
        
        return view('books.edit')->with('books', Books::find($id));
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
            'author'        => 'required|numeric|gte:1',
        ];
        $validated = $request->validate($v);
        
        Books::find($id)->update($request->all());
        return redirect('books'); // redirect to general controller path is crucial after Store/Update paths
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
        return redirect('books');

    }
}
