<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Models\vaccine;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $vaccines = vaccine::get();
        $patients = patient::get();

        return view('patient', compact('vaccines', 'patients'));
    }
}
