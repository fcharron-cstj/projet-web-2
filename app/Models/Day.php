<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relation many-to-many with the model Activity
     */
    public function activity(){
        return $this->belongsToMany(Activity::class);
    }
}
