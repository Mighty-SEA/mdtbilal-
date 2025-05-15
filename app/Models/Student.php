<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nis', 'birth_date', 'gender', 'is_alumni',
        'nik', 'kk', 'father_name', 'mother_name', 'father_job', 'mother_job', 'origin_school', 'nisn', 'birth_place',
        'qr_token',
    ];

    public function classHistories()
    {
        return $this->hasMany(StudentClassHistory::class);
    }

    public function currentClass()
    {
        return $this->hasOne(StudentClassHistory::class)->where('is_active', true);
    }
    
    public function generateQrToken()
    {
        $this->qr_token = Str::random(10);
        $this->save();
        
        return $this->qr_token;
    }
    
    public function getQrCodeContent()
    {
        if (empty($this->qr_token)) {
            $this->generateQrToken();
        }
        
        return $this->nis . '_' . $this->qr_token;
    }
} 