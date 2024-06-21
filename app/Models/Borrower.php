<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Default sudah auto-increment integer
    public $incrementing = true; // Pastikan incrementing diatur ke true
    protected $keyType = 'int'; // Tipe data primary key adalah integer

    protected $fillable = [
        'borrower_id',
        'name',
        'phone_number',
        'grade',
        'status',
        'start_time',
        'end_time',
        'book_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
