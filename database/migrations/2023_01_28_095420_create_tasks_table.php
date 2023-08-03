<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('task_file');
            $table->boolean('completed')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamp('date_deleted')->nullable();
            $table->timestamps();
            $table->index(['id', 'title', 'user_id', 'task_file']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
