<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Game;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class DestroyController extends BaseController
{
    public function __invoke(Game $game)
    {
        $game->delete();
        return redirect()->route('game.index');
    }
}
