<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nis', 'birth_date', 'gender', 'is_alumni',
        'nik', 'kk', 'father_name', 'mother_name', 'father_job', 'mother_job', 'origin_school', 'nisn', 'birth_place',
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