<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('articule',50);//артикул
            $table->string('name',100);//название
            $table->string('slug',100);//
            $table->string('img',100);//главная картинка
            $table->string('path',250);//путь к остальным картинкам
            $table->text('desc');//описание
            $table->integer('price');//цена продажы
            $table->integer('purchase');//цена закупа
            $table->integer('rating');//рейтинг
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
        Schema::dropIfExists('products');
    }
}
