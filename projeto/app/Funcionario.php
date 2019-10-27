<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $guard = 'funcionario';

    protected $fillabel = [
        'cpf',
        'nome',
        'rg_numero',
        'rg_estado',
        'rg_orgao_exp',
        'cargo',
        'email',
        'password',
        'telefone',
        'matricula'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function setor(){
        return $this->belongsToMany('App\Setor');
    }
}
