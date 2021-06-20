<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;

    protected $table = 'campus';

    protected $fillable = [
        'nome',
        'endereco',
        'bairro',
        'cidade',
        'cep',
        'uf',
    ];
}
