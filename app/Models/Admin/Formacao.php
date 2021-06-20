<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacao extends Model
{
    use HasFactory;

    protected $table = 'formacoes';

    protected $fillable = [
        'graduacao',
        'instituicao',
        'pais',
        'cidade',
        'uf',
        'professor_id',
    ];
}
