<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        
        if ($filters['searchschool'] ?? false) {
            $query->where('name', 'LIKE', '%' . request('searchschool') . '%');
        }
    }

    // public function students(): HasMany {
    //     return $this->hasMany(Student::class);
    // }

    public function blacklistings(): HasMany {
        return $this->hasMany(Blacklisting::class);
    }
}
