<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Talent;
use App\Book;
use App\BooksTalents;

use Storage;

class TalentsController extends Controller
{
    /**
     * index
     * 
     * GETでアクセスされて一覧のビューを表示する
     */
    public function index(Request $request)
    {
        $talents = Talent::all();
        
        return view('admin.talents.index', ['talents' => $talents, ]);
    }
    /**
     * add
     * 
     * GETでブラウザでからアクセスされる
     * 新規作成用のviewを表示する。
    */
    public function add()
    {
        $books = Book::all();
        return view('admin.talents.create', ['books' => $books, ]);
    }

    /**
     * create
     * 
     * POSTされた内容をDBに新規保存する
    */
    public function create(Request $request) {
      $this->validate($request, Talent::$rules);

      $talent = new Talent;
      $form = $request->all();
      $book_ids = $form['book_ids'];

       // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $talent->image_path = Storage::disk('s3')->url($path);
      } else {
        $talent->image_path = null;
      }
      unset($form['image']);
      unset($form['book_ids']);
      // データベースに保存する
      $talent->fill($form);
      $talent->save();

      foreach ($book_ids as $book_id) {
          $books_talents = new BooksTalents;
          $books_talents->book_id = $book_id;
          $books_talents->talent_id = $talent->id;
          $books_talents->save();
      }

      return redirect('admin/talents/add');
    }
    
   /**
     * edit
     * 
     * GETでブラウザでからアクセスされる
     * 編集用のviewを表示する。
    */
    public function edit(Request $request)
    {
        $books = Book::all();
        $talent = Talent::find($request->id);
        if (empty($talent)) {
          abort(404);
        }
        $books_select = [];
        foreach($books as $book) {
            $books_select[$book->id]['book'] = $book;
            $books_select[$book->id]['selected'] = false;
            foreach($talent->books as $talent_book) {
                if ($book->id == $talent_book->id) {
                    $books_select[$book->id]['selected'] = true;
                    break;
                } else {
                    $books_select[$book->id]['selected'] = false;
                }
            }
        }
        
        return view('admin.talents.edit', ['talent' => $talent, 'books' => $books_select]);
    }
  
    /**
     * update
     * 
     * POSTされた内容でDBを更新する
    */
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Talent::$rules);
        // Talent Modelからデータを取得する
        $talent = Talent::find($request->id);
        $form = $request->all();
        $book_ids = $form['book_ids'];

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $talent->image_path = Storage::disk('s3')->url($path);
        }
        unset($form['image']);
        unset($form['book_ids']);
      
        $talent->fill($form)->save();
        BooksTalents::where('talent_id', $request->id)->delete();

        foreach ($book_ids as $book_id) {
            $books_talents = new BooksTalents;
            $books_talents->book_id = $book_id;
            $books_talents->talent_id = $talent->id;
            $books_talents->save();
        }
  
        return redirect('admin/talents');
    }
    /**
     * delete
     * 
     * 該当のIDのDBのレコードを一件削除する
    */
    public function delete(Request $request)
    {
        // 該当するAuthor Modelを取得
        $talent = Talent::find($request->id);
        // 削除する
        $talent->delete();
        return redirect('admin/talents/');
    }
}
