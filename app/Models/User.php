<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function worker()
    {
        return $this->hasOne(Worker::class);
    }

    public function firm()
    {
        return $this->hasOne(Firm::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class)->latest();
    }

    public function applied()
    {
        return $this->hasMany(Connection::class, 'nurse_id');
    }

    public function payments()
    {
        if ($this->attributes['type'] == 1) {
            $attribute = 'nurse_id';
        } else {
            $attribute = 'provider_id';
        }
        return $this->hasMany(Payment::class, $attribute);
    }
}
