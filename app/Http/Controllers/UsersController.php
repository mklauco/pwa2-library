<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use Session;

use App\Models\User;

class UsersController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
    $users = User::all();
    return view('users.index')->with('users', $users);
  }
  
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
    return view('users.create')->with('create', true);
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
      'email'         => 'required|email|unique:App\Models\User,email',
    ];
    $validated = $request->validate($v);

    try {
      User::create([
        'name'        => $request['name'],
        'email'       => $request['email'],
        'password'    => Hash::make($this->defaultPassword()),
      ]);
      Session::flash('success', __('users.created'));
      return redirect('users');
    } catch (Exception $e) {
      // For later use
      // if (Auth::user()->role == 0){
      //   Session::flash('failure', $e->getMessage());
      // } else {
      //   Session::flash('failure', 'Opps... please contact administrator');
      // }
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
    return view('users.create')->with('users', User::find($id))->with('create', false);
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
      'email'         => ['required', Rule::unique('users')->ignore($id)]
    ];
    $validated = $request->validate($v);

    $u = User::find($id);
    $u->name = $request['name'];

    try {
      $u->save();
      Session::flash('success', __('users.saved'));
      return redirect('users');
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
