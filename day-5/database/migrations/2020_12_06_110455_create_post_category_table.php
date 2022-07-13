<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_category', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->tinyInteger('status')->default(0);
            // kategori users tablosunda 'user_id' üzerinden ilişkilendirildi
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                // user silindiğin ilgili kategori de silinecek
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
        Schema::dropIfExists('post_category');
    }
}
