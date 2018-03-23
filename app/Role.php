<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function Sodium\randombytes_uniform;

class Role extends Model
{
    protected $table = 'role';
    protected $fillable =
        [
          'name'
        ];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
