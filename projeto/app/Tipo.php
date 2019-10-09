<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';

    protected $fillable = ['descricao'];

    public function subtipos() {
        return $this->hasMany('App\Subtipo');
    }
}
