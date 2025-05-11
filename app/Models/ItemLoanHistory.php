<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemLoanHistory extends Model
{
    protected $table = 'history_item_loans';

    protected $fillable = [
        'item_id',
        'user_id',
        'start_time',
        'end_time',
        'reason',
        'status',
        'returned_at',
    ];
}
