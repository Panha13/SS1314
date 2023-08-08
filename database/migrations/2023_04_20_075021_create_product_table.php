<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('pid');
            $table->string('pname', 100);
            $table->string('pdesc');
            $table->boolean('enable');
            $table->double('pprice');
            $table->string('pimg', 100);
            $table->boolean('featured');
            $table->integer('cid');
            $table->foreign('cid')->references('cid')->on('category');
            $table->integer('quantity');
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
        Schema::dropIfExists('product');
    }
}
