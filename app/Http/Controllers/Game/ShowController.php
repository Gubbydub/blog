<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Game;
use App\Http\Resources\Game\GameResource;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Game $game)
    {
        return new GameResource($game);
        // return view('game.show', compact('game'));
    }
}
