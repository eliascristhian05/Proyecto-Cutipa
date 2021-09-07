<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_shopping');
            $table->unsignedBigInteger('id_article');
            $table->string('price');
            $table->string('total');
            $table->foreign('id_shopping')->references('id')->on('shopping');
            $table->foreign('id_article')->references('id')->on('articles');
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
        Schema::dropIfExists('shopping_invoices');
    }
}
