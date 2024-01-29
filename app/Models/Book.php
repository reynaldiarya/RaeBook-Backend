<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    use HasFactory;
    public function types()
    {
        return $this->belongsToMany(Type::class, 'book_types');
    }

    public function detailbook()
    {
        return $this->belongsToMany(DetailBook::class, 'detail_books');
    }
}
