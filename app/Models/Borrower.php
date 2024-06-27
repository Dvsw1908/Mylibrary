<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'grade',
        'status',
        'borrowed_book',
        'start_time',
        'end_time',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'borrowed_book');
    }
}
