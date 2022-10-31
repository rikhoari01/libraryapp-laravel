<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_book',
        'borrow_date',
        'return_date',
        'status',
    ];

    public function borrower()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function borrow()
    {
        return $this->belongsTo(Book::class, 'id_book');
    }
}
