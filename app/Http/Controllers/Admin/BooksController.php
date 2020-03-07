<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;

class BooksController extends Controller
{
    public function add()
    {
        return view('admin.books.create');
    }
    
    public function create(Request $request) {
      $this->validate($request, Book::$rules);

      $book = new Book;
      $form = $request->all();

      // データベースに保存する
      $book->fill($form);
      $book->author_id=1;
      $book->save();

      return redirect('admin/books/add');
    }
}
