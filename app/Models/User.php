<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Relations\BelongsTo; // Thêm dòng này

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id', // Thêm các cột tùy chỉnh của bạn
        'phone',
        'address',
    ];


    /**
     * Một User thuộc về một Role.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
