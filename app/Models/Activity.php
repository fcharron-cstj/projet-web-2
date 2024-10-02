<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relation one-to-many with the model Day
     */
    public function day()
    {
        return $this->belongsToMany(Day::class, 'schedules');
    }
}
