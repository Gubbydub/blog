<?php

namespace App\Services\Game;

use App\GameCategory;
use App\Http\Controllers\Controller;
use App\Game;
use App\GameTag;
use Illuminate\Support\Facades\DB;

class Service

{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $tagIds = $this->getTagIds($tags);
            $data['category_id'] = $this->getCategoryId($category);

            $game = Game::create($data);
            $game->tags()->attach($tagIds);

            DB::commit();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            DB::rollBack();
            return $exception->getMessage();
        }
        return $game;
    }

    public function update($game, $data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $tagIds = $this->getTagIdsWithUpdate($tags);
            $data['category_id'] = $this->getCategoryIdWithUpdate($category);

            $game->update($data);
            $game->tags()->sync($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            DB::rollBack();
            return $exception->getMessage();
        }
        return $game->fresh();
    }

    // getCategoryId function ---------------------
    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? GameCategory::create($item) : GameCategory::find($item['id']);
        return $category->id;
    }

    // getTagIds function ---------------------
    private function getTagIds($tags)
    {
        $tagIds = [];

        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? GameTag::create($tag) : GameTag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    // getCategoryIdWithUpdate function ---------------------
    private function getCategoryIdWithUpdate($item)
    {
        if (!isset($item['id'])) {
            $category = GameCategory::create($item);
        } else {
            $category = GameCategory::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }
        return $category->id;
    }

    // getTagIdsWithUpdate function ---------------------
    private function getTagIdsWithUpdate($tags)
    {
        $tagIds = [];

        foreach ($tags as $tag) {
            if (!isset($tag['id'])) {
                $tag = GameTag::create($tag);
            } else {
                $currentTag = GameTag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagIds[] = $tag->id;
        }
        // dd($tagIds);
        return $tagIds;
    }
}
