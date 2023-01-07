<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
    
}
