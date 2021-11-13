<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use Session;

use App\Models\User;

class UsersController extends Controller
{

  public function index()
  {
    //
    $users = User::all();
    return view('users.index')->with('users', $users);
  }
  

  public function create()
  {
    //
    return view('users.create')->with('create', true);
  }
  
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
  
  public function show($id)
  {
    //
  }
  
  public function edit($id)
  {
    //
    return view('users.create')->with('users', User::find($id))->with('create', false);
  }
  
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
  
  public function destroy($id)
  {
    //
  }
}
