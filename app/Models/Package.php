<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relation one-to-many with the model Reservation
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
