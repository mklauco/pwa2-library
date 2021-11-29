<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookPrintout extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['book_id', 'obtained_at'];

    // Printout hasOne book
    public function book(){
        return $this->hasOne(Books::class, 'id', 'book_id');
    }
}
