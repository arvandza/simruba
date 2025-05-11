<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'name',
        'description',
        'capacity',
        'status',
        'image',
    ];

    public function loans()
    {
        return $this->hasMany(RoomLoan::class);
    }
}
