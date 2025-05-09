<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nis', 'birth_date', 'gender', 'is_alumni',
    ];

    public function classHistories()
    {
        return $this->hasMany(StudentClassHistory::class);
    }

    public function currentClass()
    {
        return $this->hasOne(StudentClassHistory::class)->where('is_active', true);
    }
} 