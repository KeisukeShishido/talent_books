<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    public static $rules = array(
        'name' => 'required',
    );
}
