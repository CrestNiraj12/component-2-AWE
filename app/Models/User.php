<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, "user_roles");
    }

        /**
     * Checks if User has access to $permissions.
     */
    public function hasAccess(array $permissions) : bool
    {
        foreach ($this->roles as $role) {
            if ($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }
    /**
     * Checks if the user belongs to role.
     */
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function reviewed_products() {
        return $this->belongsToMany(Product::class, "user_reviews_products");
    }

    public function getFirstName() {
        $names = explode(' ', $this->name);
        return $names[0];
    }

    public function getLastName() {
        $names = explode(' ', $this->name);
        return $names[1];
    }
}
