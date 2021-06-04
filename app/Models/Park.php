<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property mixed id
 * @mixin IdeHelperPark
 */
class Park extends Model
{
    use HasFactory;

    public function dogs(): BelongsToMany
    {
        return $this->belongsToMany(Dog::class);
    }

}
