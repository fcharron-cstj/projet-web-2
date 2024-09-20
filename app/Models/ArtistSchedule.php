<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ArtistSchedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function schedule(): BelongsToMany
    {
        return $this->belongsToMany(Schedule::class);
    }

    public function artist(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class);
    }
}
