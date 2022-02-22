<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alocacao extends Model
{
    use HasFactory;

    protected $table = 'disciplina_professores';

    protected $fillable = [
        'posicao',
        'pontos',
        'edital_id',
        'professor_id',
        'disciplina_id',
    ];
}
