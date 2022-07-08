<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventorySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('manual_withdraw')->default(0);
            $table->integer('limit_alert')->default(0);
            $table->string('prefix_code_item')->default('IT');
            $table->string('prefix_code_product')->default('PR');
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
        Schema::dropIfExists('inventory_settings');
    }
}
