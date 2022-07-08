<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductManufacturingProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_manufacturing_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('manufacturing_process_id');
            $table->timestamps();

            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("manufacturing_process_id")->references("id")->on("manufacturing_processes")->onDelete("cascade")->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_manufacturing_processes');
    }
}
