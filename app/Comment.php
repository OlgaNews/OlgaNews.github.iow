<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $fillable=['newsid','id_u','text','time'];
    protected $table = 'comments'; // имя таблицы

    public function user() {
       return $this->belongsTo('App\User', 'id_u');
    }
    public function article() {
       return $this->belongsTo('Article', 'newsid');
    }
    
    
//
}
