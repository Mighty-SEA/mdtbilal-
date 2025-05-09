<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nip', 'gender',
    ];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
} 