<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ppdb;

class PpdbController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:100',
            'nik' => 'required|digits:16',
            'kk' => 'required|digits:16',
            'nisn' => 'nullable|digits:10',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'origin_school' => 'required|string|max:100',
            'father_name' => 'required|string|max:100',
            'mother_name' => 'required|string|max:100',
            'father_job' => 'required|string|max:100',
            'mother_job' => 'required|string|max:100',
            'class' => 'required|in:1,2,3,4,5,6',
            'whatsapp' => 'required|digits_between:10,13',
        ]);
        $ppdb = Ppdb::create($data);
        return redirect()->route('ppdb.success', ['registration_number' => $ppdb->registration_number]);
    }

    public function success($registration_number)
    {
        return view('ppdb-success', compact('registration_number'));
    }
}
