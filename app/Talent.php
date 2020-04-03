<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'description' => 'required',
    );
    
    public function books()
    {
        return $this->hasManyThrough(
            'App\Book',
            'App\BooksTalents',
            'talent_id',
            'id',
            'id',
            'book_id'
        );
    }
}
