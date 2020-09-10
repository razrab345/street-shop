<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ss_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('name');
            $table->string('description');
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
        Schema::dropIfExists('ss_categories');
    }
}
