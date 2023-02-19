<?php

namespace App\Http\Controllers\Game;

use App\Game;
use App\GameTag;
use App\GameCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $tags = GameTag::all();
        $categories = GameCategory::all();
        return view('game.create', compact('categories', 'tags'));
    }
}
