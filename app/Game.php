<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Stmt\Catch_;

class Game extends Model
{
    use SoftDeletes;

    protected $table = 'games';

    protected $guarded = [];

    public function caterory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');      
    }

}
