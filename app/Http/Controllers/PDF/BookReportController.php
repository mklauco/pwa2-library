<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PDF;

class BookReportController extends Controller
{
    //
    public function simplePDF(){
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
}
