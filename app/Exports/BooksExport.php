<?php

namespace App\Exports;

use App\Models\Books;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BooksExport implements FromView, ShouldAutoSize
{
  public function view(): View
  {
    $books = Books::with('printouts')->join('authors', 'books.author', '=', 'authors.id')->select(
      [
        'books.*',
        'authors.first_name AS author_first_name',
        'authors.last_name AS last_first_name',
        //
        ])->get();
        
        return view('excel.books', [
          'books' => $books
        ]);
      }
      
    }
    
    