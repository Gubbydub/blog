<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {


use SoftDeletes; //мягкое удаление из базы - SoftDeletes

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
