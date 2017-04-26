<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];
    protected $table = 'categories'; // имя таблицы

       public function article() {
       return $this->belongsTo('Article', 'cat');
    }
    
    //
}
