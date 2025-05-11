<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomLoanHistory extends Model
{
    protected $table = 'history_room_loans';

    protected $fillable = [
        'room_id',
        'user_id',
        'start_time',
        'end_time',
        'reason',
        'status',
        'returned_at',
    ];
}
