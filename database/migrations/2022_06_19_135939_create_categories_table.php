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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->boolean('status')->default(1);
            $table->string('slug');
            $table->enum('category_type',['item', 'product']); // TypeItem => Materials , TypeProduct => Main Categories For Products
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('level');
            $table->timestamps();
            $table->foreign("parent_id")->references("id")->on("categories")->onDelete("cascade")->cascadeOnUpdate();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
