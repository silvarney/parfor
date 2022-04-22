<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

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
