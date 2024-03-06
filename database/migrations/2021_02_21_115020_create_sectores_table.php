<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector', function (Blueprint $table) {
            //$table->id();
            // $table->unsignedBigInteger('id')->nullable()->primary();
            $table->id();
            $table->unsignedBigInteger('fK_pDes')->nullable();
            $table->foreign('fK_pDes')->references('id')->on('plandesarrollo')->onDelete('set null');
            $table->string('codS');           
            $table->string('nomS');           
            $table->string('slug');
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
        Schema::dropIfExists('sector');
    }
}
