<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomLoan extends Model
{
    protected $fillable = [
        'room_id',
        'user_id',
        'start_time',
        'end_time',
        'reason',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
