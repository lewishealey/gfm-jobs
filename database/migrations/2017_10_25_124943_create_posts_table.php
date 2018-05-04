<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->string('slug');
            $table->string('salary')->nullable();
            $table->string('hours')->nullable();
            $table->string('extra')->nullable();
            $table->string('category')->nullable(); // Dropdown
            $table->string('brand')->default("GFM"); // Dropdown
            $table->string('attachment')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('location')->default("Colchester"); // Dropdown
            $table->text('description')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post');
    }
}
