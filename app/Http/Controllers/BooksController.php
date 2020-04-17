<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    /**
     * 本一覧を表示する
     */
    public function index()
    {
        
        $books = Book::all();
        
        return view('books.index', ['books' => $books, ]);
    
    }

    /**
     * 本詳細を表示する
     */
    public function show(Request $request)
    {
        $book = Book::find($request->id);
        if (empty($book)) {
          abort(404);    
        }
        return view('books.show', ['book' => $book]);
    }
}
