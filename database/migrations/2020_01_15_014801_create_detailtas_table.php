<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailtasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailtas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namatas');
            $table->string('slug');
            $table->unsignedBigInteger('jenis_tas');
            $table->foreign('jenis_tas')->references('id')->on('jenistas');
            $table->unsignedBigInteger('bahan_tas');
            $table->foreign('bahan_tas')->references('id')->on('bahantas');
            $table->string('description')->nullable();
            $table->string('image');
            $table->string('price');
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
        Schema::dropIfExists('detailtas');
    }
}
