<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'description' => 'required',
    );
}
