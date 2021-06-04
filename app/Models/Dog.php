<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @mixin IdeHelperDog
 */
class Dog extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function parks()
    {
        return $this->belongsToMany(Park::class);
    }

    public function scopeInPark(Builder $query, $parkId): Builder
    {
        return $query->whereHas('parks', function (Builder $query) use ($parkId) {
            return $query->whereId($parkId);
        });
    }

}
