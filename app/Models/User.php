<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'firstName', 'middleName', 'lastName',
        'role', 'profileImage', 'reservations', 'favorites', 'phoneNumber',
        'occupation', 'nationality',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relationships
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Hotel::class, 'favorite_user_hotel');
    }
}
