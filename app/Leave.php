<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'user_id', 'type', 'reason', 'stauts', 'prove', 'apply_time', 'start_time', 'end_time',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
