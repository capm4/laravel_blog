<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentToComment extends Model
{
    protected $table = 'commentTocomment';
    protected $fillable =
        [
            'text','user_id','comment_id','create_at'
        ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
