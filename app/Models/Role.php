<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relation one-to-many with the model User
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
