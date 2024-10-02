<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relation one to many with model Day
     */
    public function day()
    {
        return $this->belongsToMany(Day::class);
    }

    /**
     *  Relation one to many with model Activity
     */
    public function activity()
    {
        return $this->belongsToMany(Activity::class);
    }
}
