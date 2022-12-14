<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    public function checklists()
    {
        return $this->belongsToMany(Checklist::class, 'checklist_part', 'p_id', 'c_id');
    }

    public function scopeFindByName($query, $name){
        return $query->where('p_name', 'LIKE', $name)->first();
    }
}
