<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    public function posts()
    {   
        
        //В данном методе мы понимаем что - Категория может иметь множество постов
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
    
}
