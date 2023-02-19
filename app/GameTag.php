<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameTag extends Model
{
    protected $guarded = [];
    
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

}
