<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Books;
use App\Models\User;
use App\Models\Authors;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Books::all()->count();
        $users = User::all()->count();
        $authors = Authors::all()->count();
        $notReturnedBooks = $this->notAvailableBookList(true)->count();
        return view('home')
        ->with('users', $users)
        ->with('authors', $authors)
        ->with('notReturnedBooks', $notReturnedBooks)
        ->with('books', $books);
    }
}
