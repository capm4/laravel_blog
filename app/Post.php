<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable =
        [
          'id','title','alias','image','text','user_id','category_id','storeName'
        ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function comments()
    {
        return$this->hasMany('App\Comment');
    }
}
