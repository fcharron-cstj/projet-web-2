<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relation one to one with model Day
     */
    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    /**
     *  Relation one to one with model Activity
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
