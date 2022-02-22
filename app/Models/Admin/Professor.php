<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professores';

    protected $fillable = [
        'nome',
        'sexo',
        'cpf',
        'rg',
        'emissao',
        'nascimento',
        'nacionalidade',
        'naturalidade',
        'endereco',
        'bairro',
        'cidade',
        'cep',
        'uf',
        'pais',
        'telefone',
        'email',
        'portador_necessidade',
        'campus_id',
    ];
}
