<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_provider');
            $table->unsignedBigInteger('id_employee');
            $table->date('shopping_date');
            $table->string('shopping_quantity');
            $table->foreign('id_provider')->references('id')->on('providers');
            $table->foreign('id_employee')->references('id')->on('employees');
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
        Schema::dropIfExists('shopping');
    }
}
