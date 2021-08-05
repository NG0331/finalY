<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->boolean('approve')->default(NULL);
            $table->string('userID')->nullable();
            $table->string('userName')->nullable();
            $table->string('bookName');
            $table->string('author');
            $table->string('publisher');
            $table->date('publishDate');
            $table->string('description');
            $table->double('price',8,2);
            $table->string('image');
            $table->string('dimensions');
            $table->integer('quantity')->unsigned();
            $table->integer('pages')->unsigned();
            $table->string('categoryID');
            $table->string('languageID');
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
