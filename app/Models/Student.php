<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'surname', 'address', 'city', 'province', 'university'];
    
    public function school(): BelongsTo {
        return $this->belongsTo(School::class);
    }

    public function blacklistings(): HasMany {
        return $this->hasMany(Blacklisting::class);
    }
}
