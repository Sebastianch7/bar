<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('client');
            $table->unsignedBigInteger('idCategory');
            $table->unsignedBigInteger('idStorage');
            $table->integer('cant');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('idCategory')->references('id')->on('categories');
            $table->foreign('idStorage')->references('id')->on('storages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
