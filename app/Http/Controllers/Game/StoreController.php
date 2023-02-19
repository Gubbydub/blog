<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\StoreRequest;
use App\Game;
use App\Http\Resources\Game\GameResource;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();      
        $game = $this->service->store($data);

        return $game instanceof Game ? new GameResource($game) : $game;

        // return redirect()->route('game.index');
        
    }
}
