<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('user_id')->unsigned();

            // tags tablosu ile users tablosunu 'user_id' üzerinden ilişkilendirdik
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                // ilgili user silindiğinde tags tablosundan da silinecek
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
        Schema::dropIfExists('tags');
    }
}
