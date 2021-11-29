<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoanItem extends Model
{
    use HasFactory;

    public function printout(){
       return $this->hasOne(BookPrintout::class, 'id', 'book_printout_id');
    }

    public function loan(){
        return $this->hasOne(BookLoan::class, 'id', 'book_loan_id');
     }

    public function book(){
        return $this->hasOneThrough(
            Books::class,
            BookPrintout::class,
            'id',
            'id',
            'book_printout_id',
            'id'
        );
    }

    public function user(){
        return $this->hasOneThrough(
            User::class,
            BookLoan::class,
            'id',
            'id',
            'book_loan_id',
            'user_id'
        );
    }

}
