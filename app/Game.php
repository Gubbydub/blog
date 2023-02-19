<?php

namespace App;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Stmt\Catch_;

class Game extends Model
{
    use SoftDeletes;
    use Filterable;

    protected $table = 'games';

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(GameCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(GameTag::class,
         'game_tag',
         'game_id',
         'tag_id'
         );
    }
}

