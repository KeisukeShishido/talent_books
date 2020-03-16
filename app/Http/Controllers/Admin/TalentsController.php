<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Talent;
use Storage;

class TalentsController extends Controller
{
    /**
     * add
     * 
     * GETでブラウザでからアクセスされる
     * 新規作成用のviewを表示する。
    */
    public function add()
    {
        return view('admin.talents.create');
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
      
       // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $talent->image_path = Storage::disk('s3')->url($path);
      } else {
        $talent->image_path = null;
      }
      unset($form['image']);
      // データベースに保存する
      $talent->fill($form);
      $talent->save();

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
        $talent = Talent::find($request->id);
        if (empty($talent)) {
          abort(404);    
        }
        return view('admin.talents.edit', ['talent' => $talent]);
    }
  
    /**
     * update
     * 
     * POSTされた内容でDBを更新する
    */
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, News::$rules);
        // News Modelからデータを取得する
        $news = News::find($request->id);
        $news_form = $request->all();
        if (isset($news_form['image'])) {
            $path = Storage::disk('s3')->putFile('/',$news_form['image'],'public');
            $news->image_path = Storage::disk('s3')->url($path);
            unset($news_form['image']);
            unset($news['image']);
        } elseif (isset($request->remove)) {
            $news->image_path = null;
            unset($news_form['remove']);
        }

        unset($news_form['_token']);
  
        // 該当するデータを上書きして保存する
        $news->fill($news_form)->save();

        $history = new History;
        $history->news_id = $news->id;
        $history->edited_at = Carbon::now();
        $history->save();

  
        return redirect('admin/news');
    }
    /**
     * delete
     * 
     * 該当のIDのDBのレコードを一件削除する
    */
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $news = News::find($request->id);
        // 削除する
        $news->delete();
        return redirect('admin/news/');
    } 
    
}
