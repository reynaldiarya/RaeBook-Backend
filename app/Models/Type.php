<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    use HasFactory;
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
