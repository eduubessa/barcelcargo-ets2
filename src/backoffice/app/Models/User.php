<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'username',
        'password',
        'ip_address',
        'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'password',
        'remember_token',
        'role_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'user_id', 'id');
    }

    public function cargo($limit = 6)
    {
        return $this->hasMany(Cargo::class, 'user_id', 'id')->orderByDesc('created_at')->limit($limit);
    }

    public function allCargo()
    {
        return $this->hasMany(Cargo::class, 'user_id', 'id');
    }

    public function cargosOnFirstMonth()
    {
        return $this->hasMany(Cargo::class, 'user_id', 'id')
            ->whereYear('created_at', '=', date('Y', strtotime('-2 months')))
            ->whereMonth('created_at', '=', date('m', strtotime('-2 months')));
    }

    public function cargosOnSecondMonth()
    {
        return $this->hasMany(Cargo::class, 'user_id', 'id')
            ->whereYear('created_at', '=', date('Y', strtotime('-1 months')))
            ->whereMonth('created_at', '=', date('m', strtotime('-1 months')));
    }

    public function cargosOnThirdMonth()
    {
        return $this->hasMany(Cargo::class, 'user_id', 'id')
            ->whereYear('created_at', '=', date('Y'))
            ->whereMonth('created_at', '=', date('m'));
    }
}
