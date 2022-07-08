<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->tinyInteger('status')->default(0);
            //TODO: foreignkey yapılacak field tablo formatına dikkat edilmelidir
            $table->bigInteger('user_id')->nullable()->unsigned();
            //foreignkey kullanımı
            $table->foreign('user_id')
                // foreignkey field
                ->references('id')
                // foreignkey table
                ->on('users')
                // filed silme işlemi yapıldığında ilgili tüm kayıtlar silinir
                ->onDelete('casecade')
                // kayıtlar güncellendğinde user_id güncellenilecektir
                ->onUpdate('casecade');
            // user_id bağlı olan veriler silinir deleted_at column eklenir
            //$table->softDeletes('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
