<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $table = 'disciplinas';

    protected $fillable = [
        'nome',
        'carga_horaria',
        'periodo_inicio',
        'periodo_termino',
    ];

}
