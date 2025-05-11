<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemLoan extends Model
{
    protected $fillable = ['user_id', 'item_id', 'start_time', 'end_time', 'quantity', 'reason', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
