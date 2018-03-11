<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function books(){
        return $this->belongsTo('App\Book');
    }
}