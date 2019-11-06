<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setors';

    protected $fillable = [
    	'nome'
    ];

    protected $guarded = [
        'created_at',
        'update_at'
    ];

    public function funcionario(){
        return $this->belongsToMany('App\Funcionario');
    }
    public function requerimento(){
        return $this->belongsTo('App\Requerimento');
    }
}
