<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relation many-to-one with the model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation many-to-one with the model Package
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
