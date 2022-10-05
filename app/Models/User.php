<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'name',
        'email',
        'password',
        'profile_url',
        'job_title',
        'gender',
        'phone'

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birthday',
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

    /**
     * User Comments
     * @return HasMany
     */
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id')
            ->orderBy('created_at', 'asc');
    }

    /**
     * User Products
     * @return HasMany
     */
    public function products():HasMany
    {
        return $this->hasMany(Product::class, 'user_id', 'id');
    }
}
