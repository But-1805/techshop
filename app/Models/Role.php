<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ...
use Illuminate\Database\Eloquent\Relations\HasMany; // Thêm dòng này

class Role extends Model
{
    use HasFactory;

    /**
     * Một Role có nhiều User.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
