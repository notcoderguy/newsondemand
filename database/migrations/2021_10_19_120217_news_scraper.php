<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewsScraper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('published');
            $table->string('image');
            $table->mediumText('highlight');
            $table->longText('article');
            $table->longText('keyword');
            $table->mediumText('twitter_title');
            $table->longText('twitter_description');
            $table->string('url');
            $table->string('category');
            $table->string('publisher');
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
        //
    }
}
