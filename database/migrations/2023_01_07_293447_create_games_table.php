<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('like')->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamps();

            $table->softDeletes();//мягкое удаление из базы - SoftDeletes
            
            $table->unsignedBigInteger('category_id')->nullable();

            $table->index('category_id', 'game_category_idx');

            $table->foreign('category_id', 'game_category_fk')
            ->on('game_categories')
            ->references('id')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
