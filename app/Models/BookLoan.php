<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoan extends Model
{
    use HasFactory;

    // Bookloan hasOne user
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function bookLoanItems() {
        return $this->hasMany(BookLoanItem::class, 'book_loan_id', 'id');
    }

    // public function printout() {
    //     return $this->bookLoanItems()->hasOne(BookPrintout::class, 'book_printout_id', 'id');
    // }
}
