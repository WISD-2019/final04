<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'user_id', 'type', 'reason', 'stauts', 'prove', 'apply_time', 'start_time', 'end_time',
    ];
}
