<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Aluno extends Authenticatable
{
    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'email',
        'data_nasc',
        'password',
        'cpf'
    ];


    protected $hidden = [
        'password'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];


    public function matricula(){
        return $this->hasMany('App\Matricula');
    }


}
