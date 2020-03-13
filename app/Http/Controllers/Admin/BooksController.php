<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;

class BooksController extends Controller
{
    /**
     * index
     * 
     * GETでアクセスされて一覧のビューを表示する
     */
    public function index(Request $request)
    {
        $books = Book::all();
        
        return view('admin.books.index', ['books' => $books, ]);
    }

    /**
     * add
     * 
     * GETでブラウザでからアクセスされる
     * 新規作成用のviewを表示する。
     */
    public function add()
    {
        return view('admin.books.create');
    }

    /**
     * create
     * 
     * POSTされた内容をDBに新規保存する
     */
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
