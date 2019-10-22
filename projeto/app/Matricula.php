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

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];


    public function curso(){
        return $this->hasOne('App\Curso');
    }

    public function alunos() {
        return $this->hasOne('App\Aluno');
    }


}
