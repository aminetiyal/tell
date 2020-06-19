<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTellPostsTable extends Migration
{
    public function up()
    {
        $authorClass = config('tell.users.model');
        $authorModel = new $authorClass();

        Schema::create('tell_posts', function (Blueprint $table) use ($authorModel) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('excerpt');
            $table->text('body');
            $table->boolean('published')->default(false);
            $table->dateTime('published_at')->nullable();
            $table->string('image');
            $table->foreignId('author_id')->constrained($authorModel->getTable());
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tell_posts');
    }
}
