<?php

namespace App\Http\Controllers\Game;

use App\Game;
use App\Http\Controllers\Controller;
use App\Http\Filters\GameFilter;
use App\Http\Requests\Game\FilterRequest;
use App\Http\Resources\Game\GameResource;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 8;
        // dd($data);
        $filter = app()->make(GameFilter::class, ['queryParams' => array_filter($data)]);
        $games = Game::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        
        return GameResource::collection($games);


//         $data = $request->validated();
//         // dd($data);
//         $filter = app()->make(GameFilter::class, ['queryParams' => array_filter($data)]);
//         $games = Game::filter($filter)->paginate(8);
        // return view('game.index', compact('games'));

}
}