<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fK_sProg')->nullable();
            $table->unsignedBigInteger('fK_tProd')->nullable();
            $table->unsignedBigInteger('fK_uMed')->nullable();
            $table->unsignedBigInteger('fK_user')->nullable();
            $table->string('codProd');
            $table->string('nomProd');
            $table->string('iB');
            $table->string('mCuatrienia');

            $table->string('slug');

            $table->foreign('fK_sProg')->references('id')->on('subprograma')->onDelete('set null');
            $table->foreign('fK_user')->references('id')->on('users')->onDelete('set null');
            $table->foreign('fK_tProd')->references('id')->on('tipoProductos')->onDelete('set null');
            $table->foreign('fK_uMed')->references('id')->on('unidadMedidas')->onDelete('set null');
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
        Schema::dropIfExists('producto');
    }
}
