<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_produks', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('genre_id');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 100);
            $table->string('pengarang', 100);
            $table->integer('price');
            $table->string('produk_image')->nullable();
            $table->string('produk_terbit', 5);
           
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
        Schema::dropIfExists('tabel_produks');
    }
}
