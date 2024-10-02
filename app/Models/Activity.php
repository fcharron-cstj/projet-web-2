<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * Relation many-to-many with the model Day
    */
    public function days(){
        return $this->belongsToMany(Day::class);
    }
}
