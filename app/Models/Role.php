<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    public function hasAccess(array $permissions)
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission))
                return true;
        }
        return false;
    }
    
    private function hasPermission(string $permission)
    {
        return $this->permissions[$permission] ?? false;
    }

    public function users() {
        return $this->belongsToMany(User::class, "user_roles");
    }
}
