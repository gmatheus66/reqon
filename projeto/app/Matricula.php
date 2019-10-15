<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';

    protected $fillable = [
    	'matricula',
    	'ano',
    	'semestre',
    	'status'
    ];

    public function cursos() {
        return $this->hasMany('App\Curso');
    }

    public function alunos() {
        return $this->hasMany('App\Aluno');
    }

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];
}