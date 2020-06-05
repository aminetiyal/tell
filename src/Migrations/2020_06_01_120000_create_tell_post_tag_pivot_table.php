<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTellPostTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('tell_post_tag', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained('tell_posts');
            $table->foreignId('tag_id')->constrained('tell_tags');
            $table->unique(['post_id', 'tag_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tell_post_tag');
    }
}
