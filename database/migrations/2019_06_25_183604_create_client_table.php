<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razao_soc');
            $table->string('fantasia');
            $table->string('cnpj');
            $table->string('ie');
            $table->string('email');
            $table->string('celular');
            $table->string('fixo');
            $table->string('endereco');
            $table->string('endereco_ent');
            $table->string('status');
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
        Schema::dropIfExists('client');
    }
}
