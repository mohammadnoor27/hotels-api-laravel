<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    protected $fillable = ['image_path'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
