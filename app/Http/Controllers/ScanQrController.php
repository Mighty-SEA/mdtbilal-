<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ScanQrController extends Controller
{
    public function findStudentByQr(Request $request)
    {
        $code = $request->input('code');
        
        if (!$code) {
            return response()->json([
                'success' => false,
                'message' => 'Kode QR tidak diberikan',
            ], 400);
        }
        
        // Pisahkan nis dan token dari kode QR
        $parts = explode('_', $code);
        
        if (count($parts) !== 2) {
            return response()->json([
                'success' => false,
                'message' => 'Format kode QR tidak valid',
            ], 400);
        }
        
        $nis = $parts[0];
        $qrToken = $parts[1];
        
        // Cari siswa berdasarkan nis dan qr_token
        $student = Student::where('nis', $nis)
            ->where('qr_token', $qrToken)
            ->first();
        
        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Siswa tidak ditemukan',
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'student' => $student,
        ]);
    }
} 