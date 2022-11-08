<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'r_id');
    }

    public function checklist()
    {
        return $this->belongsTo(Checklist::class, 'c_id');
    }

    public function scopeUnAccept($query)
    {
        return $query->where('is_accepted', false);
    }
}
