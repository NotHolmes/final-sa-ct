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
        return $this->belongsTo(Maintenance::class, 'm_id');
    }

    public function parts(){
        return $this->belongsToMany(Part::class, 'checklist_part', 'c_id', 'p_id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->c_status = $model->status_id;
        });

        self::created(function($model){
            $model->c_status = $model->status_id;
        });

        self::updating(function($model){
            // set c_status to = status_id
            $model->c_status = $model->status_id;
        });

        self::updated(function($model){
            // ... code here
        });

        self::deleting(function($model){
            // ... code here
        });

        self::deleted(function($model){
            // ... code here
        });
    }
}
