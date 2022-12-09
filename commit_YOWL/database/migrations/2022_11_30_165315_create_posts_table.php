<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');

            $table->string('url');

            // $table->integer('tag1_id')->nullable();
            // $table->foreign('tag1_id')
            // ->references('id')
            // ->on('tags');
            // // ->onDelete('cascade');

            // $table->integer('tag2_id')->nullable();
            // $table->foreign('tag2_id')
            // ->references('id')
            // ->on('tags');

            // $table->integer('tag3_id')->nullable();
            // $table->foreign('tag3_id')
            // ->references('id')
            // ->on('tags');

            $table->integer('likes_count')->nullable();
            $table->float('stars')->nullable();
            $table->integer('stars_count')->nullable();
            $table->integer('users_count_vote')->nullable();
            $table->integer('vue_count')->nullable();
            $table->string('alert_post_count')->nullable();
            $table->string('action')->nullable();
            $table->string('image_icon')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
