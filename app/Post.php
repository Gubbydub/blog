<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    

    protected $table = 'posts';
    
    //разрешение на добавление записей в бд 
    protected $guarded = [];
    
    // protected $fillable = ['title',
    //                         'content',
    //                         'image',
    //                         'like',
    //                         'is_published'];
    
    public $someProperty = 'проверка свойств';
    //
}
