<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'favouriteable_type',
        'favouriteable_id'
    ];

    public function favouriteable()
    {
        return $this->morphTo();
    }
}
