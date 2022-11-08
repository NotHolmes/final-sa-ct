<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function maintenance(){
        return $this->belongsTo(Maintenance::class, 'c_id');
    }

    public function parts(){
        return $this->belongsToMany(Part::class, 'checklist_part', 'c_id', 'p_id');
    }
}
