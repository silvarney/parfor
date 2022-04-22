<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alocacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'disciplina_professores';

    protected $fillable = [
        'posicao',
        'pontos',
        'edital_id',
        'professor_id',
        'disciplina_id',
    ];
}
