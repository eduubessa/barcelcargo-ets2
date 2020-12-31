<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $hidden = ["id", "user_id"];

    protected $fillable = ["display_name", "balance"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
