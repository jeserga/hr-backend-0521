<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Dog
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $owner_id
 * @property-read \App\Models\Owner $owner
 * @method static \Database\Factories\DogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperDog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Owner
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Dog[] $dogs
 * @property-read int|null $dogs_count
 * @method static \Database\Factories\OwnerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperOwner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Park
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @method static \Database\Factories\ParkFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Park newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Park newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Park query()
 * @method static \Illuminate\Database\Eloquent\Builder|Park whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Park whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Park whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Park whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperPark extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser extends \Eloquent {}
}

