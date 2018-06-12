<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampanhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('campanha', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tituloEvento', 250);
            $table->string('cnpjCpf', 30);
            $table->string('email', 200);
            $table->string('responsavel', 250);
            $table->string('tipoEvento', 200);
            $table->dateTime('dataEvento');
            $table->string('endereco', 200);
            $table->string('cidade', 200);
            $table->text('objetivoEvento', 300);
             $table->text('imagemBase64', 100000);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campanha');
    }
}
