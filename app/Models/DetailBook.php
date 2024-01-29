<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBook extends Model
{
    protected $table = 'detail_books';
    use HasFactory;
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
