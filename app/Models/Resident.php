<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFindByRoomNumber($query, $roomNumber)
    {
        return $query->where('r_room_number', $roomNumber)->first();
    }
}
