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
        return $this->belongsTo('App\Curso');
    }

    public function aluno() {
        return $this->belongsTo('App\Aluno');
    }

    public function requerimentos(){
        return $this->hasMany('App\Requerimento');
    }


}
