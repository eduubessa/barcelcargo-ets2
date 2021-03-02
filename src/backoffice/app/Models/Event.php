<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function train()
    {
        return $this->hasMany('trains', 'train_id', 'id');
    }
}
