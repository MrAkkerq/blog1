<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('changes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->unsignedInteger('task_id');
            $table->string('element');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('changes');
    }
};
