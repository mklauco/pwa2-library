<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPrintout extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'obtained_at'];

    // Printout hasOne book
    public function book(){
        return $this->hasOne(Books::class, 'id', 'book_id');
    }
}
