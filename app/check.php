<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    // protected $table='worktimes';
    protected $fillable = [
        'id', 'user_id',
    ];

}
