<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function chapters(){
        return $this->hasMany('App\Chapter');
    }

    public function notes(){
        return $this->hasMany('App\Note');
    }
}
