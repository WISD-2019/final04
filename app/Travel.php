<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    //
    protected $fillable = [
        'user_id', 'location', 'reason', 'stauts', 'apply_time', 'start_time', 'end_time',
    ];
}
