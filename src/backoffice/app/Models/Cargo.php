<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    public function driver()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
