<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->string('status'); // will be like [Withdraw, Deposit, Return, ETC]
            $table->integer('before_count');
            $table->integer('after_count');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("item_id")->references("id")->on("items")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_transactions');
    }
}
