<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public static $rules = array(
        'name' => 'required',
    );
}
