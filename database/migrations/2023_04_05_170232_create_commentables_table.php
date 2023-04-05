<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('commentables', function (Blueprint $table) {
            $table->bigInteger('comment_id')->unsigned()->index();
            $table->morphs('commentable');
            $table->primary(['comment_id', 'commentable_id', 'commentable_type']);
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commentables');
    }
};
