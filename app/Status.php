<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = ['situacao'];


public function status() {
    return $this->hasMany('App\Requerimento');
 }
}
