<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = ['nome','duracao'];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function matricula(){
        return $this->hasMany('App\Matricula', 'curso_id', 'id');
    }
}
