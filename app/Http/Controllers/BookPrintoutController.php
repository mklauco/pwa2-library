<?php

namespace App\Http\Controllers;

use App\Models\BookPrintout;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use Session;

class BookPrintoutController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        $printouts = BookPrintout::with('book')->paginate(10);
        return view('printouts.index')->with('printouts', $printouts);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('printouts.create')->with('create', true)->with('bookList', $this->bookList());
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $v = [
            'book_id'     => ['required', Rule::in($this->bookIds())],
            'obtained_at' => ['required', 'date'],
        ];
        $validated = $request->validate($v);
        
        BookPrintout::create($request->all());

        try {
            BookPrintout::create($request->all());
            Session::flash('success', __('printouts.saved'));
            return redirect('printouts');
        } catch (\Exception $e) {
            Session::flash('failure', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\BookPrintout  $bookPrintout
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\BookPrintout  $bookPrintout
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        return view('printouts.create')
        ->with('create', false)
        ->with('bookList', $this->bookList())
        ->with('printouts', BookPrintout::find($id));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\BookPrintout  $bookPrintout
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
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
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\BookPrintout  $bookPrintout
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
