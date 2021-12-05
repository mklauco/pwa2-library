<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BookLoanItem;
use Carbon\Carbon;

use PDF;

use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;

class BookReportController extends Controller
{
    //
    public function simplePDF(){

        $loans = BookLoanItem::with('book', 'user', 'loan')->get();

        $loanLength = [];
        foreach ($loans as $b){
          $loaned_at = Carbon::parse($b->loan->loaned_at);
          $returned_at = Carbon::parse($b->returned_at);
          $loanLength[$b->id] = 
          ($returned_at->diff($loaned_at)->days < 1) ? 'today' : $returned_at->diff($loaned_at)->days;
        }

        // example of pasing multiple variables to PDF generator
        // using the command 'compact'
        $document_title = 'Loan Report'; 
        $data = compact(['loans', 'document_title', 'loanLength']);

        $pdf = PDF::loadView('pdf.loanReport', $data);
        return $pdf->download('loan_report.pdf');
    }

    public function export(){
      return Excel::download(new BooksExport, 'books.xlsx');
    }

}
