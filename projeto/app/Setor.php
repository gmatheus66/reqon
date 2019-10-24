<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setors';

    protected $fillable = ['nome'];

    protected $guarded = [
        'created_at',
        'update_at'
    ];
}
