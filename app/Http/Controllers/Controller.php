<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Authors;
use App\Models\Books;
use App\Models\BookPrintout;

use Auth;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function defaultPassword(){
        return 'fchpt2021';
    }

    protected function authorList(){
        $authors = Authors::all();
        $list = [];
        foreach($authors as $a){
            $list[$a->id] = $a->first_name.' '.$a->last_name;
        }
        return $list;
    }

    protected function bookList(){
        $books = Books::all();
        $list = [];
        foreach($books as $a){
            $list[$a->id] = $a->name;
        }
        return $list;
    }

    protected function availableBookList(){
        $books = BookPrintout::join('book_loan_items', 'book_printouts.id', '=', 'book_loan_items.book_printout_id')->join('books', 'books.id', '=', 'book_printouts.book_id')->whereNotNull('book_loan_items.return_ed')->get();
        $list = [];
        foreach($books as $a){
            $list[$a->id] = $a->name;
        }
        return $list;
    }
    
    protected function bookIds(){
        return Books::all()->pluck('id')->toArray();
    }

    protected function trueFalse(){
        $list[0] = 'false';
        $list[1] = 'true';
        return $list;
    }
}
