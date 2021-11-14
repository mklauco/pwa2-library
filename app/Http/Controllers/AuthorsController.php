<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Authors;

use Session;

class AuthorsController extends Controller
{
    public function index()
    {
        //
        $authors = Authors::all();
        return view('authors.index')->with('authors', $authors);
    }
    
    public function create()
    {
        //
        return view('authors.create')->with('create', true);
    }
    
    public function store(Request $request)
    {
        $v = [
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
        ];
        $validated = $request->validate($v);
        
        try {
            Authors::create([
                'first_name'    => $request['first_name'],
                'last_name'     => $request['last_name'],
            ]);
            Session::flash('success', __('authors.created'));
            return redirect('authors');
        } catch (Exception $e) {
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
        return view('authors.create')->with('authors', Authors::find($id))->with('create', false);
    }
    
    public function update(Request $request, $id)
    {
        $v = [
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
        ];
        $validated = $request->validate($v);
        
        $u = Authors::find($id);
        $u->first_name = $request['first_name'];
        $u->last_name  = $request['last_name'];
        
        try {
            $u->save();
            Session::flash('success', __('authors.saved'));
            return redirect('authors');
        } catch (Exception $e) {
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
    }
}
