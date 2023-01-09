<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameCategory extends Model
{
    public function games() {

        return $this->hasMany(Game::class, 'category_id', 'id' );
    }
    
}
 