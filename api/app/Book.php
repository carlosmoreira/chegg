<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'pageNum'];

    public function chapters(){
        return $this->hasMany('App\Chapter');
    }

    public function notes(){
        return $this->hasMany('App\Note');
    }
}
