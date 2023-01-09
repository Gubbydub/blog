<?php

use Doctrine\DBAL\Schema\Index;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')
                ->index('post_tags_post_idx');
            $table->unsignedBigInteger('tag_id')
                ->index('post_tags_tag_idx');
            $table->foreign('post_id', 'post_tags_post_fk')
                ->on('posts')->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('tag_id', 'post_tags_tag_fk')
                ->on('tags')->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tags');
    }
}
