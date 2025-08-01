<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'quantity',
        'image',
        'status'
    ];

    public function loans()
    {
        return $this->hasMany(ItemLoan::class);
    }
}
