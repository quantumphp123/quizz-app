<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentKids extends Model
{
    use HasFactory;
    protected $table = "parentkids";

    function showKids()
    {
        return $this->hasMany('App\Models\Student');
    }
}
