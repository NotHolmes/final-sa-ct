<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    public function checklists()
    {
        return $this->belongsToMany(Checklist::class);
    }

    public function findByName($name){
        return Part::where('p_name', $this->p_name)->first();
    }
}
