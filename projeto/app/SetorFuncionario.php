<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetorFuncionario extends Model
{
    protected $table = 'setor_funcionarios';

    protected $fillabel = [
        'setor_id',
        'funcionario_id'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function funcionario(){
        return $this->hasMany('App\Funcionario');
    }

    public function setor(){
        return $this->hasMany('App\Setor');
    }
}
