<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'description' => 'required',
    );
    
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
    
    public function talents()
    {
        return $this->belongsToMany('App\Talent');
    }
}
