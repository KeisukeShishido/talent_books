<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Author;

class AuthorsController extends Controller
{
    /**
     * index
     * 
     * GETでアクセスされて一覧のビューを表示する
     */
    public function index(Request $request)
    {
        $authors = Author::all();
        
        return view('admin.authors.index', ['authors' => $authors, ]);
    }
    
    /**
     * add
     * 
     * GETでブラウザでからアクセスされる
     * 新規作成用のviewを表示する。
    */
    public function add()
    {
        return view('admin.authors.create');
    }

    /**
     * create
     * 
     * POSTされた内容をDBに新規保存する
    */
    public function create(Request $request) {
      $this->validate($request, Author::$rules);

      $author = new Author;
      $form = $request->all();

      // データベースに保存する
      $author->fill($form);
      $author->save();

      return redirect('admin/authors/add');
    }
    /**
     * edit
     * 
     * GETでブラウザでからアクセスされる
     * 編集用のviewを表示する。
    */
    public function edit(Request $request)
    {
        // Author Modelからデータを取得する
        $author = Author::find($request->id);
        if (empty($author)) {
          abort(404);    
        }
        return view('admin.authors.edit', ['author' => $author]);
    }
  
    /**
     * update
     * 
     * POSTされた内容でDBを更新する
    */
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Author::$rules);
        // Author Modelからデータを取得する
        $author = Author::find($request->id);
        $form = $request->all();

        // 該当するデータを上書きして保存する
        $author->fill($form)->save();

  
        return redirect('admin/authors');
    }
    /**
     * delete
     * 
     * 該当のIDのDBのレコードを一件削除する
    */
    public function delete(Request $request)
    {
        // 該当するAuthor Modelを取得
        $author = Author::find($request->id);
        // 削除する
        $author->delete();
        return redirect('admin/authors/');
    } 
}
