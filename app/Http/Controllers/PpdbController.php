<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ppdb;

class PpdbController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s.\'\-]+$/'],
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:100',
            'nik' => ['required', 'digits:16', 'unique:ppdbs,nik'],
            'kk' => ['required', 'digits:16', 'unique:ppdbs,kk'],
            'nisn' => 'nullable|digits:10',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'origin_school' => 'required|string|max:100',
            'father_name' => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s.\'\-]+$/'],
            'mother_name' => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s.\'\-]+$/'],
            'father_job' => 'required|string|max:100',
            'mother_job' => 'required|string|max:100',
            'class' => 'required|in:1,2,3,4,5,6',
            'whatsapp' => ['required', 'digits_between:10,13'],
        ], [
            'name.regex' => 'Nama hanya boleh berisi huruf, spasi, titik, tanda petik, dan strip.',
            'father_name.regex' => 'Nama ayah hanya boleh berisi huruf, spasi, titik, tanda petik, dan strip.',
            'mother_name.regex' => 'Nama ibu hanya boleh berisi huruf, spasi, titik, tanda petik, dan strip.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'kk.unique' => 'Nomor KK sudah terdaftar.',
        ]);
        $ppdb = Ppdb::create($data);
        return redirect()->route('ppdb.success', ['registration_number' => $ppdb->registration_number]);
    }

    public function success($registration_number)
    {
        return view('ppdb-success', compact('registration_number'));
    }
}
