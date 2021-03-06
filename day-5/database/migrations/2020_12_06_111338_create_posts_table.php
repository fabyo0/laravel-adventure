<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->text('content');
            $table->bigInteger('user_id')->unsigned();
            $table->tinyInteger('status')->default(0);
            $table->string('image')->nullable();
            $table->string('slug');
            $table->json('tags_id');
            $table->bigInteger('category_id')->unsigned();
            $table->dateTime('publish_date')->nullable();

            // posts tablosu ile users tablosunu 'user_id' üzerinden ilişkilendirdik
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            // posts tablosu ile category tablosunu 'post_category' üzerinden ilişkilendirdik
            $table->foreign('category_id')
                ->references('id')
                ->on('post_category')
                ->onDelete('cascade');

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
}
