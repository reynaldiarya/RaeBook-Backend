<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Models\DetailBook;
use App\Http\Resources\DetailBookResource;

class BookApiController extends Controller
{
    public function getbooks()
    {
        $books = Book::with('types')->get();
        return BookResource::collection($books);
    }

    public function getmybooks(Request $request)
    {
        $detailbooks = DetailBook::with('book.types')
            ->where('user_id', '=', $request->user()->id)
            ->get();

        // Mengambil objek 'book' dari setiap 'DetailBook'
        $books = $detailbooks->pluck('book')->unique();

        // Mengirimkan kumpulan 'BookResource'
        return BookResource::collection($books);
    }
}
