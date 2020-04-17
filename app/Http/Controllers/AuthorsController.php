<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
    /**
     * 著者の一覧を表示する
     */
    public function index()
    {
        
        $authors = Author::all();
        
        return view('authors.index', ['authors' => $authors, ]);
    
    }
}
