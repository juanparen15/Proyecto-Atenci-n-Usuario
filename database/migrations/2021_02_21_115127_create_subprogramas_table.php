<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subprograma', function (Blueprint $table) {
            //$table->id();
            // $table->unsignedBigInteger('id')->nullable()->primary();
            $table->id();
            $table->unsignedBigInteger('fK_programa')->nullable();
            $table->foreign('fK_programa')->references('id')->on('programa')->onDelete('set null');
            $table->string('codSP');
            $table->string('nomSP');
            $table->string('slug');
           // $table->unsignedBigInteger('detplanadquisicione_id')->nullable();
            //$table->foreign('detplanadquisicione_id')->references('id')->on('detplanadquisiciones')->onDelete('set null');
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
        Schema::dropIfExists('subprograma');
    }
}
