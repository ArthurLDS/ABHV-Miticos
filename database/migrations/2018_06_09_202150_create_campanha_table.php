<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampanhaTable extends Migration
{
    public function up()
    {
        Schema::create('campanha', function (Blueprint $table) {
            $table->increments('id');
            $table->string('responsavel', 250);
            $table->string('tipoEvento', 200);
            $table->dateTime('dataEvento');
            $table->string('endereco', 200);
            $table->string('cidade', 200);
            $table->text('objetivoEvento', 300);
            $table->timestamps();
            $table->softDeletes();
        });
    }
  
    public function down()
    {
        Schema::drop('campanha');
    }
}