<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    protected $fillable = ['name', 'description', 'genre', 'author'];
    
    // Books hasMany printouts
    public function printouts(){
        return $this->hasMany(BookPrintout::class, 'book_id', 'id');
    }
    
}
