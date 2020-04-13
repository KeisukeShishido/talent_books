<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talent;

class TopPageController extends Controller
{
    /**
     * トップページを表示する
     */
    public function index()
    {
        
        $talents = Talent::all();
        
        return view('toppage.index', ['talents' => $talents, ]);
    
    }
}
