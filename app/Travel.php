<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    //
    protected $fillable = [
        'user_id', 'location', 'reason', 'stauts', 'apply_time', 'start_time', 'end_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
