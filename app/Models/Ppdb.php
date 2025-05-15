<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    protected $fillable = [
        'name', 'registration_number', 'birth_date', 'gender', 'nik', 'kk', 'father_name', 'mother_name', 'father_job', 'mother_job', 'origin_school', 'nisn', 'birth_place', 'class', 'whatsapp',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->registration_number)) {
                do {
                    $random = 'PPDB-' . strtoupper(bin2hex(random_bytes(4)));
                } while (self::where('registration_number', $random)->exists());
                $model->registration_number = $random;
            }
        });
    }
}
