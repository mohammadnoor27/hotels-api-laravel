<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name', 'description', 'location', 'rate', 'price', 'admin', 'number_rooms',
    ];

    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorite_user_hotel');
    }
}
