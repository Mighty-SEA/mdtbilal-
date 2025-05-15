<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SppPayment extends Model
{
    protected $fillable = [
        'student_id', 'month', 'year', 'paid_at', 'amount', 'infaq',
    ];

    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class);
    }
}
