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
        Schema::create('ss_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('article');
            $table->string('name');
            $table->integer('brand_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('sezon');
            $table->string('description');
            $table->string('razmer');
            $table->string('material');
            $table->string('url');
            $table->string('img');
            $table->string('meta_key');
            $table->string('meta_description');
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
        Schema::dropIfExists('ss_products');
    }
}
