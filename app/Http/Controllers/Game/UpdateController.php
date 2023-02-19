<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\UpdateRequest;
use App\Game;
use App\Http\Resources\Game\GameResource;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Game $game)
    {
        
        $data = $request->validated();
        // dd($data);       
        $game = $this->service->update($game, $data);
        
        return $game instanceof Game ? new GameResource($game) : $game;
        // return new GameResource($game);

        // $data = $request->validated();       
        // $this->service->update($game, $data);
        // return redirect()->route('game.show', $game->id);
    }
}
