<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setors';

    protected $fillable = ['nome'];

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];
}
