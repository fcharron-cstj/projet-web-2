<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relation many-to-many with the medel Schedule
     */
    public function schedules(){
        return $this->belongsToMany(Schedule::class);
    }
}
