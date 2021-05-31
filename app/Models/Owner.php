<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @mixin IdeHelperOwner
 */
class Owner extends Model
{
    use HasFactory;

    public function dogs()
    {
        return $this->hasMany(Dog::class);
    }
}
