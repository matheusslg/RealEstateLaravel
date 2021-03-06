<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->unsignedInteger('id_categoria');
            $table->unsignedInteger('id_modalidade');
            $table->unsignedInteger('id_localizacao');
            $table->unsignedInteger('id_cidade');
            $table->unsignedInteger('id_estado');
            $table->string('localidade');
            $table->text('descricao');
            $table->string('geolocalizacao')->nullable();
            $table->decimal('valor', 10, 2);
            $table->decimal('area', 10, 2);
            $table->string('tipo_area');
            $table->integer('quartos')->nullable();
            $table->integer('banheiros')->nullable();
            $table->integer('garagens')->nullable();
            $table->timestamps();

            // relations
            $table->foreign('id_categoria')->references('id')->on('categories');
            $table->foreign('id_modalidade')->references('id')->on('modalities');
            $table->foreign('id_localizacao')->references('id')->on('locations');
            $table->foreign('id_cidade')->references('id')->on('cities');
            $table->foreign('id_estado')->references('id')->on('states');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property');
    }
}
