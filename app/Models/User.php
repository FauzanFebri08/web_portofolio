<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    

    public function profile()
    {
        return $this->hasOne(Profiles::class, 'user_id');
    }

    public function skills()
    {
        return $this->hasMany(Skills::class, 'user_id');
    }

    public function experiences()
    {
        return $this->hasMany(Experiences::class, 'user_id');
    }

    public function contacts()
    {
        return $this->hasMany(Contacts::class, 'user_id');
    }

    public function projects()
    {
        return $this->hasMany(Projects::class, 'user_id');
    }
}