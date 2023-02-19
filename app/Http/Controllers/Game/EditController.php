<?php

namespace App\Http\Controllers\Game;

use App\GameTag;
use App\GameCategory;
use App\Http\Controllers\Controller;
use App\Game;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Game $game)
    {
        $tags = GameTag::all();
        $categories = GameCategory::all();

        // dd($game);
        return view(
            'game.edit',
            compact(
                'game',
                'categories',
                 'tags'
            )
        );
    }
}
