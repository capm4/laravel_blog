<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable =
        [
          'text','user_id','post_id','comment_id'
        ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
