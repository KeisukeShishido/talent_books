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
    
     /**
     * edit
     * 
     * GETでブラウザでからアクセスされる
     * 編集用のviewを表示する。
    */
    public function edit(Request $request)
    {
        // Book Modelからデータを取得する
        $book = Book::find($request->id);
        if (empty($book)) {
          abort(404);    
        }
        return view('admin.books.edit', ['book' => $book]);
    }
  
    /**
     * update
     * 
     * POSTされた内容でDBを更新する
    */
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Book::$rules);
        // Book Modelからデータを取得する
        $book = Book::find($request->id);
        $form = $request->all();

        // 該当するデータを上書きして保存する
        $book->fill($form)->save();
  
        return redirect('admin/books');
    }
    
    /**
     * delete
     * 
     * 該当のIDのDBのレコードを一件削除する
    */
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $book = Book::find($request->id);
        // 削除する
        $book->delete();
        return redirect('admin/books/');
    }
    
}
