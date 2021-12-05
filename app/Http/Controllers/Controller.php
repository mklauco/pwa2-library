<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Authors;
use App\Models\Books;
use App\Models\BookPrintout;
use App\Models\BookLoanItem;

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
        // $b = BookLoanItem::rightjoin('book_printouts', 'book_printouts.id', '=', 'book_loan_items.book_printout_id')->whereNotNull('book_loan_items.returned_at')->pluck('book_printouts.id')->toArray();

        $b = BookLoanItem::whereNotNull('book_loan_items.returned_at')->pluck('book_loan_items.book_printout_id')->toArray();

        $books = BookPrintout::join('books', 'books.id', '=', 'book_printouts.book_id')->whereIn('book_printouts.id', $b)->orderBy('book_printouts.id', 'asc')->select([
            'books.name AS name',
            'book_printouts.id AS pid',
            'books.id AS bid'
        ])->get();

        $list = [];
        foreach($books as $a){
            if (Auth::user()->debug == true){
                $adminInfo = ' (pID: '.$a->pid.', bID:'.$a->bid.')';
            } else {
                $adminInfo = '';
            }
            
            $list[$a->pid] = $a->name.$adminInfo;
        }
        return $list;
    }
    
    protected function notAvailableBookList($collection = false){
        $books = BookPrintout::join('book_loan_items', 'book_printouts.id', '=', 'book_loan_items.book_printout_id')->join('books', 'books.id', '=', 'book_printouts.book_id')->whereNull('book_loan_items.returned_at')->get();
        if($collection == true){
            return $books;
        } else {
            $list = [];
            foreach($books as $a){
                $list[$a->id] = $a->name;
            }
            return $list;
        }

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
