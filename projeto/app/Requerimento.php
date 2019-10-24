<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requerimento extends Model
{
    protected $table = 'requerimentos';

    protected $fillable = [
            'protocolo',
            'descricao',
            'subtipo_id',
            'status_id',
            'setor',
            'req_pai_id',
            'funcionario_id',
            'setor_id',
            'matricula_id'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function matricula(){
        return $this->belongsTo('App\Matricula');
    }
    public function funcionario(){
        return $this->belongsTo('App\Funcionario');
    }

}
