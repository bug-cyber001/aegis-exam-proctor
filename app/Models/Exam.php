<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['title', 'description', 'duration_minutes', 'is_ai_proctoring_enabled'];
}
