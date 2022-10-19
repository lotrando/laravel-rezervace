<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pernum',
        'user_name',
        'email',
        'date_birth',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = Hash::make($password);
    // }

    public function getCreatedAtAttribute($value)
    {
        return date('j. m. Y', strtotime($value));
    }

    /**
     * Convert date type
     *
     * @param [type] $value
     * @return void
     */
    public function getUpdatedAtAttribute($value)
    {
        return date('j. m. Y', strtotime($value));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    /**
     * Chech User sas role
     */
    public function hasAnyRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * Check User has any roles
     */
    public function hasAnyRoles($role)
    {
        return null !== $this->roles()->whereIn('name', $role)->first();
    }
}
