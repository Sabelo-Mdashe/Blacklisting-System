<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'surname', 'address', 'city', 'province', 'university'];
    
    public function student() {
        return $this->belongsTo('App\Models\School');
    }
}
