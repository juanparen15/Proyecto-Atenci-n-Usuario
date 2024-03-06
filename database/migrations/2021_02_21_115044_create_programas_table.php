<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa', function (Blueprint $table) {
            //$table->id();
            // $table->unsignedBigInteger('id')->nullable()->primary();
            $table->id();
            $table->unsignedBigInteger('fK_sector')->nullable();
            $table->foreign('fK_sector')->references('id')->on('sector')->onDelete('set null');
            $table->string('codProg');
            $table->string('nomProg');
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
        Schema::dropIfExists('programa');
    }
}
