<?php

namespace App\Filament\Resources\SppPaymentResource\Pages;

use App\Filament\Resources\SppPaymentResource;
use App\Models\Student;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSppPayment extends CreateRecord
{
    protected static string $resource = SppPaymentResource::class;
    
    protected function beforeCreate(): void
    {
        // Cek apakah Student yang dipilih sudah memiliki qr_token
        // Jika belum, buatkan qr_token
        $studentId = $this->data['student_id'];
        
        if ($studentId) {
            $student = Student::find($studentId);
            
            if ($student && empty($student->qr_token)) {
                $student->generateQrToken();
            }
        }
    }
}
