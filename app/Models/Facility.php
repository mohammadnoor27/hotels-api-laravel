<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = ['name'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
