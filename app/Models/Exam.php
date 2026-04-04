<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'title',
        'duration',
        'access_code',
        'teacher_id',
        'status',       // ADDED
        'start_time',   // ADDED
    ];

    // This tells Laravel to treat start_time as a Carbon datetime object
    protected $casts = [
        'start_time' => 'datetime',
    ];

    // ... your other relationship functions ...


    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
