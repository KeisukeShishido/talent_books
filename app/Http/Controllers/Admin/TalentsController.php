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
}
