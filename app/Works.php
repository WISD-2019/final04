<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $fillable = [
        'user_id', 'name', 'lack', 'on_work', 'off_work',
    ];
}
