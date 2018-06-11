<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    protected $fillable = ['responsavel','tipoEvento','dataEvento','endereco', 'cidade', 'objetivoEvento'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'campanha';
}