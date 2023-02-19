<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameCategory extends Model
{
    protected $table = 'game_categories';
    protected $guarded = [];
    

    public function games() {

        return $this->hasMany(Game::class );
    }
    
}
 