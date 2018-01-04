<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public $timestamps = false;

    public function books(){
        return $this->belongsTo('App\Book');
    }
}
