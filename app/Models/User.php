<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $connection = "mysql";
    protected $table = "users";

    protected $fillable = [
      'username', 'email', 'avatar_path', 'background_path', 'badges', 'discord', 'twitter', 'youtube', 'steam',
        'bio', 'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
