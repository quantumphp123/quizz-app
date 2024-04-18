<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherFeedbacks extends Model
{
    use HasFactory;

    function getCreatedAtAttribute($value) {
        return date('d-M-Y', strtotime($value));
    }
}
