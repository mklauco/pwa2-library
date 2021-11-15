<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use Session;

use App\Models\User;
use Auth;

class UsersController extends Controller
{

  public function index()
  {
    //
    // dd(Auth::user());
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
      'first_name'    => 'required|string',
      'last_name'     => 'required|string',
      'email'         => 'required|email|unique:App\Models\User,email',
    ];
    $validated = $request->validate($v);

    try {
      User::create([
        'first_name'    => $request['first_name'],
        'last_name'     => $request['last_name'],
        'email'         => $request['email'],
        'password'      => Hash::make($this->defaultPassword()),
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
      'first_name'    => 'required|string',
      'last_name'     => 'required|string',
      'email'         => ['required', Rule::unique('users')->ignore($id)]
    ];
    $validated = $request->validate($v);

    $u = User::find($id);
    $u->first_name = $request['first_name'];
    $u->last_name  = $request['last_name'];

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
