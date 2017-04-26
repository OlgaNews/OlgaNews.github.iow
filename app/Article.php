<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
	protected $fillable=['title','alias','des','text','img'];
        protected $table = 'articles'; // имя таблицы

    public function comments() {
       return $this->hasOne('App\Comment');
    }
    public function categories() {
       return $this->hasOne('App\Category');
    }
}
