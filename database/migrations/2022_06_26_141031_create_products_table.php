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
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('attributes')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('bar_code_scanner')->nullable()->unique();
            $table->string('code')->nullable()->unique();
            $table->integer('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('image')->nullable();
            $table->integer('alert_limit')->default(0)->nullable();
            $table->unsignedBigInteger('measurement_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign("parent_id")->references("id")->on("products")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("measurement_id")->references("id")->on("measurements")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade")->cascadeOnUpdate();

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
